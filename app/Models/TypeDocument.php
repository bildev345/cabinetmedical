<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;

    // public $timestamps = false; 
    protected $guarded = ["id"];

    public function documents(){
        return $this->hasMany(Document::class);
    }
    
}
