<?php

namespace App\Http\Controllers\Director;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClinicController extends Controller
{
    /** Pour obtenir l'adder */

    private function adder()
    {
        $adder = auth()->user();
        return $adder;
    }
    private function slug($request)
    {
        $slug = Str::slug($request. now());
        return $slug;
    }
    /**
     * Affichage des cliniques en ordre decroissante se basant sur la date de creation.
     */
    public function index()
    {
        // authId
        $adderId = $this->adder()->id;

        $clinics = Clinic::with('adder')
                    ->where('adder_id', $adderId)
                    ->orderByDesc('created_at')->get();

        return view('director.menu', [
            'clinics' => $clinics,
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
        // Les regles de securite pour la validation
        $request->validate([
            'clinic_name' => ['required', 'string', 'min:2', 'max:50'],
            'clinic_description' => ['required', 'string',],
            'clinic_city' => ['required', 'string', 'min:2', 'max:150'],
            'clinic_logo' => ['required', 'image', 'mimes:jpg,jpeg,png,', 'max:2000'],
            'clinic_mail' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Clinic::class],
            'clinic_number' => ['required', 'numeric',],
        ]);

        //obtenu depuis la function private adder()
        $adder = $this->adder();
        

        // Reception du lien du chemin depuis une function privee
        $logoPath = $this->storeLogo($request->clinic_logo, $request);
        // dd($logoPath);

        // pour la mise a jour

        // if($logo === null || $logo->getError()){
            // on met le disk suivi du chemin [dynamique donc on va se base sur les donne envoyer de la base de donne]
            // Storage::disk('public')->delete($logo);
        // }
        

        $addClinic = new Clinic();
        $addClinic->clinic_name = $request->clinic_name;
        $addClinic->clinic_slug = $this->slug($request->clinic_name);
        $addClinic->clinic_description = $request->clinic_description;
        $addClinic->clinic_city = $request->clinic_city;
        $addClinic->clinic_country = 'Benin';
        $addClinic->clinic_neighborhood_adress = $request->clinic_neighborhood_adress;
        $addClinic->clinic_geographic_adress = 'position';
        $addClinic->clinic_logo = $logoPath;
        $addClinic->clinic_mail = $request->clinic_mail;
        $addClinic->clinic_number = $request->clinic_number;
        $addClinic->adder_id = $adder->id;

        if($this->adder()->role === 'patient')
        {
            // on met le disk suivi du chemin [dynamique donc on va se base sur les donne envoyer de la base de donne]
            Storage::disk('public')->delete($logoPath);
            return back()->with('warning', 'Vous n\'avez pas les autorisation pour finaliser ce processus ');
        }

        $addClinic->save();
        return back()->with('success', 'Votre clinique <span class=\' font-bold underline underline-offset-8 \' >' .$request->clinic_name. '</span> est inscrit avec success ');
    }

    /**
     * Methode private juste pour le traitement d'image
     */

     private function storeLogo($logo, $request)
        {
            $logo = $request->clinic_logo;
            $path = 'director/clinics';

            if ($logo !== null && !$logo->getError()) {
                $imageName = Carbon::now()->timestamp . '.' . $request->clinic_logo->getClientOriginalExtension();
                $logoPath = $logo->storeAs($path, $imageName, 'public');
                return $logoPath;
            }

            
        // if($logo !== null && !$logo->getError()){
        //     $imageName = Carbon::now()->timestamp. '.' .$request->clinic_logo->extension();
        //     $logoPath = $logo->storeAs('director', $imageName, 'public');
        // }

            return null;
        }


    /**
     * Affichage du clinique clique pour directeur
     * pour autre clinique auquel ils appartiennent
     */
    public function show(string $id)
    {
        $clinic = Clinic::find($id);
        // dd($clinic);

        $clinicCount = $clinic->countUsersClinics();

        return view('director.clinic-detail', [
            'clinic' => $clinic,
            'clinicCount' => $clinicCount,
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
