<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class propiedades_operatoria extends Model
{
    protected $fillable = [
        'propiedad',
        'operatoria',
        'importe',
        'moneda',
        'estado'
    ];
    
    static function get_operatorias($id_propiedad, $id_operatoria = null)
    {
        $where = null;
        if($id_propiedad)   $where .= " AND p.id = " . $id_propiedad;
        if($id_operatoria)  $where .= " AND po.id = " . $id_operatoria;

        // Operatorias
        $operatorias = DB::select('
            SELECT
                po.*, 
                m.unidad, 
                e.descripcion as estado_descripcion
            FROM
                propiedades_operatorias po,
                propiedades p,
                monedas m,
                estados e
            WHERE po.propiedad = p.id
              AND po.propiedad = ' . $id_propiedad . '
              AND po.moneda = m.id
              AND po.estado = e.id
              ' . $where
        );

        return $operatorias;
    }
}
