<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role_name',
        'role_description',
        'creator_id',
    ];

    /** Relation entre role et user
     * ici une table pivot sera vu que c'est ManyToMany
     * entre les deux roles et users
     * donc a la fin on passe le nom de la table pivot ici [roles_users]
     */
    
    public function personalsClinics(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_user')
                    ->withPivot('clinic_id', 'adder_id')
                    ->withTimestamps();
    }

    /** Relation entre role et clinic
     * 
     */

    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
}
