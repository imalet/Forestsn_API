<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    public function filiere_ecoles(){
        return $this->hasMany(FiliereEcole::class);
    }
}