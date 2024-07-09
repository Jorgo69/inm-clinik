<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckAccount;
use Illuminate\Http\Request;

class AskingController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $askers = CheckAccount::with('users')->get();

        return view('adminSystem.askers', [
            'askers' => $askers,
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
        $asker = CheckAccount::with('users')->find($id);


        return view('adminSystem.asker-detail', [
            'asker' => $asker
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $asking_id = $request->asking_id;
        $asker = CheckAccount::find($asking_id);
        
        $asker->actived = 'actived';

        If($asker->actived === 'actived')
        {
            return back()->with('warning', 'Ce compte est deja valider');
        }

        $asker->update();

        return back()->with('success', 'Compte valider avec success');
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
