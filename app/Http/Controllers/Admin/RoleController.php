<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /** pour recuperer les data de celui qui est connecte */
    private function adder()
    {
        $adder = auth()->user();
        return $adder;
    }

    /** pour voir si un donne similaire existe */
    private function existingRole($request)
    {
        $existingRole = Role::where('role_name', $request->role_name)
                    // ->where('role_description', $request->role_description)
                    ->first();
        return $existingRole;
    }

    /**
     * Affiche la vu index du role uniquement pour le admin-systeme.
     */
    public function index()
    {
        $roles = Role::orderByDesc('created_at')->get();

        return view('adminSystem.role.role-index', [
            'roles' => $roles,
            'adder' => $this->adder(),
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
        $request->validate([
            'role_name' => ['required', 'string', 'min:5'],
            'role_description' => ['required', 'string', 'max:255', 'min:5'],
        ]);

        $addRole = new Role();
        $addRole->role_name = $request->role_name;
        $addRole->role_description = $request->role_description;
        $addRole->creator_id = $this->adder()->id;
        
        if($this->adder()->role !== 'admin...system'){
            return back()->with('error', 'Vous n\'avez pas l\'autorisation pour ajouter de nouvelle role ');
        }

        // si un donne similaire a ete trouve avec le function privee existingRole()
        if($this->existingRole($request))
        {
            return back()->with('warning', 'Le Role ' .$request->role_name. ' existe deja');
        }

        $addRole->save();
        return back()->with('success', 'Role ' .$addRole->role_name. ' ajouter avec success');
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
