<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class TypeAnalyse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function resultats()
    {
        return $this->hasMany(ResultatAnalyse::class);
    }
}
