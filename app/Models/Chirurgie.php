<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirurgie extends Model
{
    use HasFactory;

    protected $table = 'chirurgies';

    protected $fillable = [
        'date',
        'libelle_chirurgie',
        'observation',
        'consultation_id'
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}
