<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    // use HasFactory, SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'clinic_id',
        'date',
        'time',
        'reason',
    ];


    public function patientAppointment(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
