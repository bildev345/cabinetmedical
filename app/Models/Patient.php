<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $guarded = ['id'];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
    public function constants()
    {
        return $this->belongsToMany(Constant::class, 'constants') 
            ->withPivot('date', 'valeur') 
            ->withTimestamps(); 
    }
}
