<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ConsultationMedical;
use App\Services\ClinicService;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    protected $myClinicIdService;
    
    public function __construct(ClinicService $myClinicIdService)
    {
        $this->myClinicIdService = $myClinicIdService;
    }

    private function clinic(int $clinicId)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);
        return $clinic;
    }

    /**
     * Liste des consultations.
     */
    public function index(int $clinicId)
    {
        

        return view('member.consultation.consultation-index', [
            'clinic' => $this->clinic($clinicId),
        ]);
    }

    /**
     *
     */
    public function create(int $clinicId)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'summernoteConsultation' => ['required', 'string', 'min:10'],
            'summernotePrescription' => ['required', 'string', 'min:10'],
        ]);
        
        $consultation = new ConsultationMedical();
        $consultation->patient_id = $request->patient_id;
        $consultation->clinic_id = $request->clinic_id;
        $consultation->concerned_id = $request->concerned_id;
        $consultation->consultation = $request->summernoteConsultation;
        $consultation->prescription_medical = $request->summernotePrescription;
        
        $consultation->save();
        
        return back()->with('success', 'Consultation et Prescription noter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $clinicId, int $patientId)
    {
        $patient = \App\Models\User::find($patientId);
        
        return view('member.consultation.consultation-detail-show', [
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
