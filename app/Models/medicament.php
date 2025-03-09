<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];

    public function prescriptions(){
        return $this->belongsToMany(Prescription::class)->withPivot('note')
        ->withTimestamps();
    }
}