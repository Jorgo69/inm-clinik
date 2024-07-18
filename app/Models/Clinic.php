<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Clinic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fiillable = [
        'clinic_name',
        'clinic_description',
        'clinic_geographic_adress',
        'clinic_logo',
        'clinic_mail',
        'clinic_number',
        'adder_id',
        'validator_id',
    ];

    /* 
    *
    * Relation entre la clinique et le compte ajouteur et/ou valideur
    */
    public function adder(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function validator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Url
    public function LogoUrl(): string
    {
        // return Storage::url($this->clinic_logo);
        return Storage::disk('public')->url($this->clinic_logo);
    }

    /** Relation entre clinic et user
     * ici une table pivot sera vu que c'est BelongsToMany
     * entre les deux clincs et users
     * donc a la fin on passe le nom de la table pivot ici [user_clinic]
     */
    public function usersClincs(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'clinic_user')
                    ->withPivot('adder_id')
                    ->withTimestamps();
    }
    /** pour avoir le nombre total de clinique depuis model Clinic
     * Utilisation
     * $clinic = Clinic::find(1); // Trouvez une clinique spécifique
    *  $count = $clinic->countUsersClinics();
     * 
     */
    public function countUsersClinics()
    {
        return $this->usersClincs()->count();
    }

    public function roles() {
        return $this->hasMany(Role::class);
    }

    /**
     * Concernant la clinique a laquelle la demande d'adhesion est adresse
     * Has Many parce que [peut etre fait pour plusieur clinique]
     */

     public function membershipRequests(): HasMany
     {
        return $this->hasMany(RequestToBecomeClinicMember::class, 'id');
     }
}
