<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ClinicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberPersonalController extends Controller
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

    /** Liste du personnel a travers l'id de la clinique */
    private function personal(int $id)
    {
        $personals = \App\Models\RequestToBecomeClinicMember::with('askers')
        ->where('statut', 'validated')
        ->where('clinic_id', $id)
        ->get();

        return $personals;
    }

    private function showRole(int $role_id)
    {
        $showRole = \App\Models\Role::find($role_id);

        $showRoleName = $showRole->role_name;
        // dd($showRoleName);


        if (!$showRoleName) {
            return "Role not found";
        }
    
        switch ($showRoleName) {
            case 'doctor':
                return 'member-doctor';
            case 'secretary':
                return 'member-secretary';
            case 'accountant':
                return 'member-accountant';
            case 'nurse':
                return 'member-nurse';
            case 'pharmacist':
                return 'member-pharmacist';
            // Ajoutez d'autres cas selon les rôles que vous avez
            default:
                return 'unknown-role';
        }
        
    }


    /**
     * Display a listing of the resource.
     */
    public function index(int $clinicId)
    {

        // $member = User::whereHas('clinicUserRoles', )->get();
        // dd($member);
        

        $personals =  $this->personal($clinicId);

        // dd($personals);

        return view('director.member.personal.member-personal-index' , [
            'clinic' => $this->clinic($clinicId),
            'personals' => $personals,
        ]);
    }

    /**
     * Pour l'attribution de role au personnel avec reponse.
     */
    public function create(Request $request)
    {
        // Valide que 'attribute_role' est requis, doit être un nombre, et doit exister dans la table roles
        $request->validate([
            'attribute_role' => ['required', 'numeric', 'exists:roles,id'],
        ]);

        // Récupération des données du formulaire
        $clinic_id = $request->clinic_id; // ID de la clinique
        $personal_id = $request->personal_id; // ID de la personne (utilisateur)
        $role_id = $request->attribute_role; // ID du rôle sélectionné
        $adder_id = Auth::id(); // ID de l'utilisateur qui fait l'ajout (l'administrateur ou directeur)

        $role_member = $this->showRole($role_id);

        $updateToMember = User::find($personal_id);
        $updateToMember->role = $role_member;

        $updateToMember->update();

        // Récupération de l'utilisateur à qui le rôle sera attribué
        $user = \App\Models\User::findOrFail($personal_id);

        $roleAttribute = $user->clinicUserRoles()
        ->wherePivot('clinic_id', $clinic_id)
        // ->wherePivot('role_id', $role_id)
        ->exists();

        if (!$roleAttribute) {

            // Utilisation de la relation many-to-many pour attacher le rôle à l'utilisateur avec les informations supplémentaires
            $user->clinicUserRoles()->attach($role_id, [
                'clinic_id' => $clinic_id,
                'adder_id' => $adder_id,
            ]);
            return back()->with('success', 'Role attribuer avec success');
        }
        return back()->with('info', 'Ce utilisateur a deja un role');
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
    public function show(int $clinicId,int $personalId)
    {
        $personal = \App\Models\User::find($personalId);

        $currentPersonal = $personal->with('clinicUserRoles')->findOrFail($personalId);

        // dd($personalId);
        

        $roles = \App\Models\Role::all();

        return view('director.member.personal.member-personal-detail', [
            'clinic' => $this->clinic($clinicId),
            'personal' => $personal,
            'roles' => $roles,
            'currentPersonal' => $currentPersonal,
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
    public function update(Request $request, int $clinicId, int $personalId)
    {
        // Valide que 'attribute_role' est requis, doit être un nombre, et doit exister dans la table roles
        $request->validate([
            'attribute_role' => ['required', 'numeric', 'exists:roles,id'],
        ]);
        // dd($clinicId);
        $role_id = $request->attribute_role; // ID du rôle sélectionné
        $adder_id = Auth::id(); // ID de l'utilisateur qui fait l'ajout (l'administrateur ou directeur)

        $role_member = $this->showRole($role_id);

        $updateToMember = User::find($personalId);
        $updateToMember->role = $role_member;

        $updateToMember->update();

        // Récupération de l'utilisateur à qui le rôle sera attribué
        $user = \App\Models\User::findOrFail($personalId);

        $roleAttribute = $user->clinicUserRoles()
        ->wherePivot('clinic_id', $clinicId)
        ->exists();

        if ($roleAttribute) {

            $user->clinicUserRoles()->detach();

            // Utilisation de la relation many-to-many pour attacher le rôle à l'utilisateur avec les informations supplémentaires
            $user->clinicUserRoles()->attach($role_id, [
                'clinic_id' => $clinicId,
                'adder_id' => $adder_id,
            ]);
            return back()->with('info', 'Poste changer avec  success');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
