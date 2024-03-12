<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    public function filieres(){
        return $this->hasMany(FiliereMetier::class);
    }

}