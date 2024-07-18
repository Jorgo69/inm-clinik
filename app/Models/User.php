<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'firstname',
        'birthdate',
        'gender',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* 
    *
    * relation entre Subcription et User
    */
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    public function checkAccount(): BelongsTo
    {
        return $this->belongsTo(CheckAccount::class, 'asker_id');
    }

    /** Relation entre user et clinic
     * ici une table pivot sera vu que c'est ManyToMany
     * entre les deux users et clinics
     * donc a la fin on passe le nom de la table pivot ici [clinic_user]
     */
    public function clinicsUsers(): BelongsToMany
    {
        return $this->belongsToMany(Clinic::class, 'clinic_user')
                                    ->withPivot('adder_id')
                                    ->withTimestamps();
    }
    /** pour avoir le nombre total de cet users dans les clinique
     * 
     * $user = User::find(1); // Trouvez un utilisateur spécifique
    *  $count = $user->countClinicsUsers();
     */
    public function countClinicsUsers()
    {
        return $this->clinicsUsers()->count();
    }

    /** 
     * Relation entre User et Role -- users --roles
     * avec champs supplement [clinic_id, adder_id]
     */
    public function clinicUserRoles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user')
                    ->withPivot('clinic_id', 'adder_id')
                    ->withTimestamps();
    }

    /** 
     * Pour devenir membre
     * Has Many parce que [peut etre fait par plusieur personne]
     */

     public function membershipRequests() : HasMany
     {
        return $this->hasMany(RequestToBecomeClinicMember::class, 'asker_id');
     }
}
