<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes; 

class ResultatAnalyse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function analyse()
    {
        return $this->belongsTo(Analyse::class, 'analyse_id');
    }

    public function type_analyse()
    {
        return $this->belongsTo(TypeAnalyse::class, 'type_analyse_id');
    }
}

