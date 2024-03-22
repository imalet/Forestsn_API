<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bourse extends Model
{
    use HasFactory;

    protected $fillable = ['type_bourse', 'description_type_bourse'];
}
