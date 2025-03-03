<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    use HasFactory;
    protected $gaurded=['id'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function etatConsultation()
    {
        return $this->belongsTo(EtatConsultation::class);
    }

    public function typeConsultation()
    {
        return $this->belongsTo(typeConsultation::class);
    }
}
