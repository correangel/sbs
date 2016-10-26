<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propiedades_operatoria extends Model
{
    protected $fillable = [
        'propiedad',
        'operatoria',
        'importe',
        'moneda',
        'estado'
    ];
}
