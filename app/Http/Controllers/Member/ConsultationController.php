<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Services\ClinicService;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    protected $myClinicIdService;
    public function __construct(ClinicService $myClinicIdService)
    {
        $this->myClinicIdService = $myClinicIdService;
    }

    /**
     * Liste des consultations.
     */
    public function index(int $id)
    {
        $clinic = $clinic =  $this->myClinicIdService->ClinicIdService($id);
        return view('member.consultation.consultation-index', [
            'clinic' => $clinic,
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
        return view('member.consultation.consultation-detail-show', [
            $id => 1,
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
