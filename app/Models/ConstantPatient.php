<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstantPatient extends Model
{
    use HasFactory;

    protected $table = 'constant_patient'; // Updated table name

    protected $fillable = [
        'patient_id',
        'constant_id',
        'date',
        'valeur',
    ];

    // Relationship with Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relationship with Constant model
    public function constant()
    {
        return $this->belongsTo(Constant::class);
    }
}
