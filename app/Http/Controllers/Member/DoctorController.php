<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ConsultationMedical;
use Illuminate\Http\Request;

class DoctorController extends Controller
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

    private function member()
    {
        $member = auth()->user();
        
        return $member;
    }
    /**
     * Affichage specifique au doctor d'une clinique.
     * Ici ses RDV
     */
    public function index(int $clinicId)
    {
        $appointmentsMine = Appointment::where('concerned_id', $this->member()->id)->get();

        return view('member.doctor.member-doctor-index', [
            'clinic' => $this->clinic($clinicId),
            'appointmentsMine' => $appointmentsMine,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $clinicId)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);

        return view('member.doctor.member-doctor-consultations-index', [
            'clinic' => $clinic,
            'clinicId' => $clinicId,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Request $request)
    {
        
        $consultation = ConsultationMedical::find($request->consultationsId);
        dd($consultation);
    }
}
