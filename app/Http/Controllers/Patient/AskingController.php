<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\RequestToBecomeClinicMember;
use Illuminate\Http\Request;

class AskingController extends Controller
{
    private function asker()
    {
        $asker = auth()->user();
        return $asker;
    }

    private function askerExist($request)
    {
        $exist = RequestToBecomeClinicMember::where('asker_id', $this->asker()->id)
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
        $asking = new RequestToBecomeClinicMember();
        $asking->asker_id = $this->asker()->id;
        $asking->clinic_id = $request->clinic_id;

        if($this->askerExist($request)){
            return back()->with('warning', 'Vous avez deja soumis une demande');
            // $asking->update();
        }
        $asking->save();

        return back()->with('success', 'Demande soumise avec success');
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
