<?php

namespace App\Http\Controllers\Director;

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
        $request->validate([
            'complet_name' => ['required', 'string', 'max:255'],
            'matricule' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'files.*' => ['required', 'image', 'mimes:jpg,jpeg,png'],
            'number' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.CheckAccount::class],
        ]);
        
        $director = auth()->user();

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $filesPaths = [];

            foreach ($files as $file) {
                $userFullName = $director->name . "_" . $director->firstname;
                $fileName = $userFullName . "_" . now()->format('YmdHis') . "." . $file->getClientOriginalExtension();

                $file->storeAs('admin/checkAccount', $fileName);
                $filesPaths[] = 'admin/checkAccount/' . $fileName;
            }
            // dd($filesPaths);

        // $critere puisse que la methode updateOrCreate se basera dessus pour savoir 
        //elle doit cree une nouvelle entree ou fait la mise a jour
        $critere = [
            'complet_name' => $request->complet_name,
            'asker_id' => $director->id,
        ];
        // $data car c'est uniquement les informations a ajouter
        $data = [
            'files' => json_encode($filesPaths), // Enregistrez les chemins des fichiers sous forme de chaîne JSON
            'number' => $request->number,
            'email' => $request->email,
            'matricule' => $request->matricule,
            'adresse' => $request->adresse,
        ];

        // dd($data);
        
            CheckAccount::updateOrCreate($critere, $data);

        return back()->with(['success' => 'Fichiers téléchargés et informations enregistrées avec succès'], 200);
    }

    return back()->with(['error' => 'Aucun fichier à télécharger'], 400);

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
