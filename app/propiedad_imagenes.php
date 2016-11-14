<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class propiedad_imagenes extends Model
{
    protected $fillable = [
        'propiedad',
        'nombre_archivo',
        'rol',
        'orden'
    ];

    static function get_imagenes($id_propiedad)
    {
        // IMAGENES
        $imagenes = propiedad_imagenes::orderBy('id')
            ->where('propiedad', $id_propiedad)
            ->get();
        return $imagenes;
    }

    static function guardar_imagenes($imagenes, $id_propiedad)
    {
        // Inicializar el orden según si existen o no imagenes cargadas con anterioridad
        $imagen_orden = DB::select('select max(orden) as orden from propiedad_imagenes where propiedad = ' . $id_propiedad . ';');
        if(!empty($imagen_orden)){
            $i = $imagen_orden[0]->orden + 1;
        }else{
            $i = 1;
        }
        foreach($imagenes as $file) {
            $nombre = time() . $file->getClientOriginalName();
            Image::make( $file->getRealPath()  )
                ->resize(1000, 644)
                ->save('img/' . $nombre);

            propiedad_imagenes::create([
                'propiedad'         => $id_propiedad,
                'nombre_archivo'    => $nombre,
                'rol'               => 'L',   // lista
                'orden'             => $i
            ]);
            $i++;
        }
    }

    static function guardar_imagen_principal($imagen, $id_propiedad)
    {
        $nombre = time() . $imagen->getClientOriginalName();
        // thumb
        Image::make( $imagen->getRealPath() )
            ->resize(242.48, 156.16)
            ->save('img/' . 'thumb_' . $nombre);
        Image::make( $imagen->getRealPath() )
            ->resize(1000, 644)
            ->save('img/' . $nombre);
        self::create([
            'propiedad'         => $id_propiedad,
            'nombre_archivo'    => $nombre,
            'rol'               => 'P',
            'orden'             => 0
        ]);
    }
}
