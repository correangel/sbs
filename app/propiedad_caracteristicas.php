<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propiedad_caracteristicas extends Model
{
    protected $fillable = [
        'propiedad',
        'caracteristica'
    ];
}
