<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
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
        $patients = User::where('role', 'patient')
                        ->orderByDesc('created_at')->get();
        
        return view('member.patient.member-patient-index', [
            'clinic' => $this->clinic($clinicId),
            'patients' => $patients,
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
            'password' => Hash::make('password'),
            // 'password' => Hash::make(Carbon::now()),
        ]);

        return back()->with('success', 'Patient ajouter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $clinicId, int $patientId)
    {
        $patient = User::find($patientId);

        return view('member.patient.member-patient-detail', [
            'clinic' => $this->clinic($clinicId),
            'patient' => $patient,
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
