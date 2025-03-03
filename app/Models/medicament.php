<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicament extends Model
{
    use HasFactory;
    
    protected $guarded=['id'];

    public function prescriptions(){
        return $this->belongsToMany(prescription::class)->withPivot('note')
        ->withTimestamps();
    }
}