<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeDocument;
use App\Models\Patient;

class Document extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $disk = 'local'; 
    protected $guarded  = ["id"];

    public function typeDocument(){
        return $this->belongsTo(TypeDocument::class);
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}
