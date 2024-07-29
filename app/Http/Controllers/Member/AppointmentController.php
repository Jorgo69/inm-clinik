<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Services\ClinicService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
    

    private function member()
    {
        $member = auth()->user();
        
        return $member;
    }
    
    /**
     * Liste des RDV de la clinique concerner
     */
    public function index(int $clinicId)
    {
        // $appointments = Appointment::where('clinic_id', $clinicId)->get();

        return view('member.appointment.member-appointment-index', [
            'clinic' => $this->clinic($clinicId),
            // 'appointments' => $appointments,
            'clinicId' => $clinicId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(int $clinicId, int $appointmentId)
    {
        $appointment = Appointment::find($appointmentId);

        return view('member.appointment.member-appointment-show-detail', [
            'clinic' => $this->clinic($clinicId),
            'appointment' => $appointment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = $this->member();

        $clinic = \App\Models\Clinic::whereHas('usersClincs', function($query) use ($user) {
            $query->where('user_id', $user->id);
            // $query->where('role', 'doctor');
        })->first();

        if(!$clinic)
        {
            return back()->with('error', 'Vous n\'avez pas les permissions requises pour effectuer cette action');
        }

        $appointment = Appointment::find($request->appointment_id);
        $appointment->statut = 'accepted';
        $appointment->sector = $this->member()->role;
        $appointment->concerned_id = $this->member()->id;

        $appointment->update();

        return back()->with('success', 'Vous avez pris ce Rendez-vous');

        
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
