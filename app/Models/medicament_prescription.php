<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicament_prescription extends Model
{
    use HasFactory;
    protected $fillable = ['medicament_id', 'prescription_id', 'note'];
    protected $guarded=['id'];
}

