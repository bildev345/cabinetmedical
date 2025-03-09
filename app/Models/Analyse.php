<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
    public function resultatAnalyses(){
        return $this->hasMany(ResultatAnalyse::class);
    }
}
