<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = ['date_debut', 'date_fin', 'etat_consultation_id', 'patient_id', 'type_consultation_id', 'rapport', 'gratuit'];

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
        return $this->belongsTo(TypeConsultation::class);
    }
}

