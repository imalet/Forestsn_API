<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = ['nom_filiere', 'description_filiere'];

    public function filiere_ecole(){
        return $this->hasMany(FiliereEcole::class);
    }

    public function metiers(){
        return $this->hasMany(FiliereMetier::class);
    }

}