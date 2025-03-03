<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeConsultation extends Model
{
    protected $fillable = ['type_consultation', 'couleur'];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
