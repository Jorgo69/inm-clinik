<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Services\ClinicService;
use Illuminate\Http\Request;

class MemberDoctorController extends Controller
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
     * Affichage de la liste des docteur de la clinique via id
     */
    public function index(int $clinicId)
    {
        
        // dd($clinic);

        // $personals = $this->personal($clinicId);
        // dd($secretaries);
        
        $role = \App\Models\Role::where('role_name', 'doctor')->first();

        // Récupérer les utilisateurs ayant ce rôle
        $doctors = \App\Models\User::whereHas('clinicUserRoles', function($query) use ($role, $clinicId) {
            $query->where('role_id', $role->id);
            $query->where('clinic_id', $clinicId);
        })->get();

        return view('director.member.doctor.director-doctor-index', [
            'clinic' => $this->clinic($clinicId),
            'doctors' => $doctors,
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
    public function destroy(string $id)
    {
        //
    }
}
