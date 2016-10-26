<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propiedad_imagenes extends Model
{
    protected $fillable = [
        'propiedad',
        'nombre_archivo',
        'rol',
        'orden'
    ];
}
