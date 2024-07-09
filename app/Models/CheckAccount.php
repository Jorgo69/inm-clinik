<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'complet_name',
        'matricule',
        'adresse',
        'files',
        'number',
        'email',
        'asker_id'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
}
