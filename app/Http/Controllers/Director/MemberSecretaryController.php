<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Services\ClinicService;
use Illuminate\Http\Request;

class MemberSecretaryController extends Controller
{
    protected $myClinicIdService;
    public function __construct(ClinicService $myClinicIdService)
    {
        $this->myClinicIdService = $myClinicIdService;
    }

    /** Liste le personnel a travers l'id de la clinique */
    private function personal(int $id)
    {
        $personals = \App\Models\RequestToBecomeClinicMember::with('askers')
        ->where('statut', 'validated')
        ->where('clinic_id', $id)
        ->get();

        return $personals;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(int $clinicId)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);

        // $personals = $this->personal($clinicId);
        // dd($secretaries);
        
        $role = \App\Models\Role::where('role_name', 'secretary')->firstOrFail();

        // Récupérer les utilisateurs ayant ce rôle
        $secretaires = \App\Models\User::whereHas('clinicUserRoles', function($query) use ($role, $clinicId) {
            $query->where('role_id', $role->id);
            $query->where('clinic_id', $clinicId);
        })->get();
        // dd($secretair);

        return view('director.member.secretary.director-member-secretary-index', [
            'clinic' => $clinic,
            'secretaires' => $secretaires,
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
