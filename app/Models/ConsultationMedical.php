<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultationMedical extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Pour lier la table users et consultation concernant les medecins et les patients qui s'y trouvent
     */

     public function concerned(): BelongsTo
     {
        return $this->belongsTo(User::class, 'concerned_id');
     }

     public function patient(): BelongsTo
     {
        return $this->belongsTo(User::class, 'patient_id');
     }

     /** 
      * Pour lier retrouver la clinique
      */

      public function theClinic(): BelongsTo
      {
        return $this->belongsTo(Clinic::class, 'clinic_id');
      }
    
}
