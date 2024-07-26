<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\CheckAccount;
use App\Models\RequestToBecomeClinicMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AskingController extends Controller
{
    /** Recuperer le user connecter */
    private function adder()
    {
        $adder = auth()->user();
        return $adder;
    }

    /** Recuperer l'id de celui qui a ajouter la clinique */
    private function clinicAdding()
    {
        $clinicAdding = \App\Models\Clinic::where('adder_id', $this->adder()->id)
                        ->pluck('id')            
                        ->first();

        if(!$clinicAdding){
            return null;
        }
        return $clinicAdding;
    }

    private function storeMultipleFile()
    {

    }

    /**
     * Pour afficher le tableau des users qui veulent rejoindre une clinique.
     */
    public function index()
    {
        $askers = RequestToBecomeClinicMember::with(['askers', 'clinics'])
                    ->where('clinic_id', $this->clinicAdding())
                    ->orderByDesc('created_at')
                    ->get();

        return view('director.asking.asker', [
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
     * Complexion d'info pour que le compte puisse etre valide
     */
    public function store(Request $request)
    {
        $request->validate([
            'complet_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:50'],
            'files.*' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'number' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.CheckAccount::class],
        ]);
        
        $director = auth()->user();

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $filesPaths = [];

            foreach ($files as $file) {
                $userFullName = $director->name . "_" . $director->firstname;
                $fileName = $userFullName . "_" . now()->format('YmdHis') . "." . $file->getClientOriginalExtension();

                $file->storeAs('admin/checkAccount', $fileName, 'public');
                $filesPaths[] = 'admin/checkAccount/' . $fileName;
        }
        
        $checkAccount = new CheckAccount();
        $checkAccount->asker_id = $director->id;
        $checkAccount->complet_name = $request->complet_name;
        $checkAccount->tel_number = $request->number;
        $checkAccount->email = $request->email;
        $checkAccount->city = $request->city;
        $checkAccount->country = 'Benin';
        $checkAccount->neighborhood_adress = $request->neighborhood_adress;
        $checkAccount->files = json_encode($filesPaths);
        
            
        $checkAccount->save();

        return back()->with(['success' => 'Fichiers téléchargés et informations enregistrées avec succès'], 200);
    }
    // Storage::disk('public')->delete($filesPaths);
    return back()->with(['warning' => 'Aucun fichier à télécharger'], 400);

    }

    /**
     * Afficher detail demande.
     */
    public function show(string $id)
    {
        $asker = RequestToBecomeClinicMember::find($id);

        return view('director.asking.asker-detail', [
            'asker' => $asker,
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
     * Approuver le user a appartenir a cette clinique.
     */
    public function update(Request $request, int $sker_id)
    {
        $asking = RequestToBecomeClinicMember::find($sker_id);
        // dd($asking);

        $clinicId = $asking->clinic_id;
        $askerId = $asking->asker_id;

        $clinic = \App\Models\Clinic::find($clinicId);

        if (!$clinic) {
            abort(403);
        }
        
        if($asking->statut === 'validated')
        {
            $asking->statut = 'waiting';
            $clinic->usersClincs()->detach($askerId, ['adder_id' => $this->adder()->id]);
            $asking->update();
            return back()->with('error', 'Membre retirer avec success');
        }

        $asking->statut = 'validated';
        $clinic->usersClincs()->attach($askerId, ['adder_id' => $this->adder()->id]);
        $asking->update();
        return back()->with('success', 'Membre approuver avec success');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
