<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['consultation_id','date','rapport'];
    protected $guarded=['id'];
    // Dans le modèle Prescription
public function consultation()
{
    return $this->belongsTo(Consultation::class);
}

    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class)
                    ->withPivot('note')
                    ->withTimestamps();
    }
}

