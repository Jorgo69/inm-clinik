<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    private function asker()
    {
        $asker = auth()->user();
        return $asker;
    }

    private function askerExist($request)
    {
        $exist = \App\Models\RequestToBecomeClinicMember::where('asker_id', $this->asker()->id)
                                            ->where('clinic_id', $request->clinic_id)
                                            ->first();
        
        return $exist;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(int $id)
    {
        $clinic = \App\Models\Clinic::find($id);

        return view('patient.clinic-detail', [
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
