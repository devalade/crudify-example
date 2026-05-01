<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'nombre_de_vote',
        'photo'
    ];

    protected $casts = [
        'nombre_de_vote' => 'integer'
    ];

}
