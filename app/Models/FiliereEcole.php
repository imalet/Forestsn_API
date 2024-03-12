<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiliereEcole extends Model
{
    use HasFactory;

    public function ecole(){
        return $this->belongsTo(Ecole::class);
    }

    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }
}
