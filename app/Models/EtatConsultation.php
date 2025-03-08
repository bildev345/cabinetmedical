<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EtatConsultation extends Model
{
    protected $fillable = ['etat', 'couleur'];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}