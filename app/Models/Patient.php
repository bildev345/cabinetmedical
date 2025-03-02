<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'date_naissance',
        'adresse',
        'ville',
        'tel',
        'sexe',
        'taille',
        'poids',
        'groupe_sangin',
        'assure'
    ];

    
    public function constants()
    {
        return $this->belongsToMany(Constant::class, 'constants') 
            ->withPivot('date', 'valeur') 
            ->withTimestamps(); 
    }
}
