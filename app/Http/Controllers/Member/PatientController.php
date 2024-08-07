<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\ConsultationMedical;
use App\Models\User;
use App\Services\ClinicService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    protected $myClinicIdService;
    public function __construct(ClinicService $myClinicIdService)
    {
        $this->myClinicIdService = $myClinicIdService;
    }

    private function clinic($clinicId)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);
        return $clinic;
    }

    /**
     * Affichage de la liste des patients de la clinique.
     */
    public function index(int $clinicId)
    {
        
        
        return view('member.patient.member-patient-index', [
            'clinic' => $this->clinic($clinicId),
            'clinicId' => $clinicId,
        ]);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $clinicId)
    {
        
        return view('member.patient.member-patient-create', [
            'clinic' => $this->clinic($clinicId)
        ]);
    }

    public function takeAppointment(Request $request)
    {
        
        $request->validate([
            'reason' => ['required', 'min:5'],
            'date' => ['required', 'min:5'],
            'time' => ['required', 'min:5'],
        ]);

        $appointment = new \App\Models\Appointment();
        $appointment->reason = $request->reason;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->patient_id = $request->patient_id;
        $appointment->clinic_id = $request->clinic_id;
        // $appointment->sector = $request->sector;

        // dd($appointment);

        $appointment->save();

        return redirect()->route('member.patient.index', ['clinic_id' => $request->clinic_id])->with('success', 'Rendez-vous note avec success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.\App\Models\User::class],
        ]);

        // dd($request->all());

        \App\Models\User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'role' => 'patient',
            'email' => $request->email,
            // 'password' => Hash::make('password'),
            'password' => Hash::make(Carbon::now()),
        ]);

        return back()->with('success', 'Patient ajouter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $clinicId, int $patientId)
    {
        $patient = User::find($patientId);

        $consultations = ConsultationMedical::where('patient_id', $patientId)->get();

        return view('member.patient.member-patient-detail', [
            'clinic' => $this->clinic($clinicId),
            'patient' => $patient,
            'consultations' => $consultations,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
