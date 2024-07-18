<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecretaryController extends Controller
{
    protected $myClinicIdService;
    public function __construct(\App\Services\ClinicService $myClinicIdService)
    {
        $this->myClinicIdService = $myClinicIdService;
    }

    /**
     * Affichage de la vue de prise de RDV de la secretaire.
     */
    public function index(int $id)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($id);

        return view('member.secretary.member-secretaire-index', [
            'clinic' => $clinic,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($clinicId)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);

        return view('member.secretary.member-secretaire-index', [
            'clinic' => $clinic,
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
    public function show(int $clinicId)
    {
        $clinic =  $this->myClinicIdService->ClinicIdService($clinicId);

        return view('member.secretary.member-secretaire-show-detail', [
            'clinic' => $clinic,
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
