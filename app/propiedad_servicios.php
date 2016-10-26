<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propiedad_servicios extends Model
{
    protected $fillable = [
        'propiedad',
        'servicio'
    ];
}
