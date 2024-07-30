<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestToBecomeClinicMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'asker_id',
        'clinic_id',
        'statut',
    ];
    
    /**
     * Get the user that owns the RequestToBecomeClinicMember
     *
     * Concernant le compte qui fait la demande 
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function askers()
    {
        return $this->belongsTo(User::class, 'asker_id');
    }

    /**
     * Concernant la clinique a laquelle il adresse le demande
     */
    public function clinics(): BelongsTo
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
