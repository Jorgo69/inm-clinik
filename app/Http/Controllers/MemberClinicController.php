<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accepted = \App\Models\RequestToBecomeClinicMember::where('asker_id', auth()->user()->id)
                                                            ->where('statut', 'validated')
                                                            ->pluck('clinic_id');

        $clinics = \App\Models\Clinic::where('id', $accepted)->get();

        return view('member.clinics.member-clinic-index', [
            'clinics' => $accepted,
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
