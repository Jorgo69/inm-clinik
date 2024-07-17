<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\RequestToBecomeClinicMember;
use App\Models\User;
use App\Services\ClinicService;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    protected $myClinicIdService;
    public function __construct(ClinicService $myClinicIdService)
    {
        $this->myClinicIdService = $myClinicIdService;
    }

    /** Liste le personnel a travers l'id de la clinique */
    private function personal(int $id)
    {
        $personals = RequestToBecomeClinicMember::with('askers')
        ->where('statut', 'validated')
        ->where('clinic_id', $id)
        ->get();

        return $personals;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($id);

        $personals =  $this->personal($id);
        

        return view('member.personal.member-personal-index', [
            'clinic' => $clinic,
            'personals' => $personals,
        ]);
    }

    /**
     * Pour l'attribution de role au personnel avec reponse.
     */
    public function create()
    {
        
        return back()->with('success', 'Role attribuer avec success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Affiche les details pour un membre specifique.
     */
    public function show(string $id)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($id);

        $personal = $this->personal($id)->find($id);

        $roles = \App\Models\Role::all();

        return view('member.personal.member-personal-detail', [
            'clinic' => $clinic,
            'personal' => $personal,
            'roles' => $roles,
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
