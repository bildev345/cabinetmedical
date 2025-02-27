<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $disk = 'local'; 
    protected $guarded  = ["id"];

    public function typeDocument(){
        return $this->belongsTo(TypeDocument::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
