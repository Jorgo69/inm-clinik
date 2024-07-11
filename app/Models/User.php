<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    public function clinics(): BelongsToMany
    {
        return $this->belongsToMany(Clinic::class, 'user_clinic');
    }

    /** 
     * Relation entre user et role
     * avec un champs supplement [clinic_id]
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_users')->withPivot('clinic_id');
    }
}
