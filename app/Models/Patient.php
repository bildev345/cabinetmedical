<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['nom', 'prenom', 'cin', ' date_naissance', 'adresse', 'ville', 'tel', 'sexe', 'taille', 'poids', 'groupe_sangin', 'assure'];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}