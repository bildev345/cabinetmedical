<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    use HasFactory;

    protected $fillable = ['constant'];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'constants_patients')
                    ->withPivot('date', 'valeur')
                    ->withTimestamps();
    }
}
