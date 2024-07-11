<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'vallidator_id',
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
}