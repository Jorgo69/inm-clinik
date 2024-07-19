<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    protected $myClinicIdService;
    public function __construct(\App\Services\ClinicService $myClinicIdService)
    {
        $this->myClinicIdService = $myClinicIdService;
    }

    private function clinic(int $clinicId)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);
        return $clinic;
    }

    /**
     * Affichage de la vue de prise de RDV de la secretaire.
     */
    public function index(int $clinicId)
    {
        

        return view('member.secretary.member-secretaire-index', [
            'clinic' => $this->clinic($clinicId),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $clinicId)
    {
        // $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);

        return view('member.secretary.member-secretary-post', [
            'clinic' => $this->clinic($clinicId),
        ]);
    }

    public function searchPatient(Request $request)
    {
        $query = $request->get('query');
        $users = \App\Models\User::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reason' => ['required', 'min:5'],
            'date' => ['required', 'min:5'],
            'time' => ['required', 'min:5'],
        ]);

        $appointment = new Appointment();
        $appointment->reason = $request->reason;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->patient_id = $request->patient_id;
        $appointment->clinic_id = $request->clinic_id;
        $appointment->sector = $request->sector;

        $appointment->save();

        return back()->with('success', 'Rendez-vous note avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $clinicId)
    {
        // $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);

        return view('member.secretary.member-secretaire-show-detail', [
            'clinic' => $this->clinic($clinicId),
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
