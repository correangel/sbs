<?php
namespace App;

ini_set('upload_max_filesize', '20M');

use App\Http\Requests;
use ClassPreloader\Config;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;


class propiedades extends Model
{
    protected $fillable = [
        'estado_inmueble',
        'fecha_publicacion',
        'expensas',
        'habitaciones',
        'ambientes',
        'ambientes_tipos',
        'toilette',
        'banos',
        'cocheras',
        'antiguedad',
        'superficie_total',
        'superficie_cubierta',
        'ubicacion',
        'ubicacion_url',            // GoogleMaps
        'localidad',
        'titulo',
        'descripcion_corta',
        'descripcion',
        'tipo_propiedad'
    ];

    static function buscar($request, $paginas)
    {
        // Filtros
        $busqueda_titulo            = $request->get('titulo');
        $busqueda_operatoria        = $request->get('operatoria');
        $busqueda_tipo_propiedad    = $request->get('tipo_propiedad');
        $busqueda_estado_inmueble   = $request->get('estado_inmueble');
        if($request->get('importe_desde')){
            $busqueda_importe_desde = $request->get('importe_desde');
        }else{
            $busqueda_importe_desde = 0;
        }
        if($request->get('importe_hasta')){
            $busqueda_importe_hasta = $request->get('importe_hasta');
        }else{
            $busqueda_importe_hasta = 1000000000;
        }
        if($busqueda_tipo_propiedad != '-1') {
            $operador_tipo_propiedad = "=";
        }else {
            $operador_tipo_propiedad = "<>";
        }
        // Obtener datos
        if($request->get('operatoria')) {
            $propiedades = DB::table('propiedades')
                ->select('propiedades.*', 'propiedades_operatorias.*', 'propiedades_operatorias.id as id_operatoria', 'monedas.unidad', 'estados.descripcion as estado_descripcion')
                ->join('propiedades_operatorias', 'propiedades.id', '=', 'propiedades_operatorias.propiedad')
                ->join('monedas', 'propiedades_operatorias.moneda', '=', 'monedas.id')
                ->join('estados', 'propiedades_operatorias.estado', '=', 'estados.id')
                ->where('propiedades_operatorias.estado', '1')
                ->where('propiedades_operatorias.operatoria', $busqueda_operatoria)
                ->where('tipo_propiedad', $operador_tipo_propiedad, $busqueda_tipo_propiedad)
                ->where('titulo', 'ilike', '%'.$busqueda_titulo.'%')
                ->where('propiedades.estado_inmueble', $busqueda_estado_inmueble)
                ->where('propiedades_operatorias.importe', '>=', $busqueda_importe_desde)
                ->where('propiedades_operatorias.importe', '<=', $busqueda_importe_hasta)
                ->paginate($paginas);
        }else{
            // RESULTADOS POR DEFECTO
            if(empty($busqueda_operatoria)) {
                $busqueda_operatoria = 1;
            }
            $propiedades = DB::table('propiedades')//$propiedades = self::table('propiedades')
                ->select('propiedades.*', 'propiedades_operatorias.*', 'propiedades_operatorias.id as id_operatoria', 'monedas.unidad', 'estados.descripcion as estado_descripcion')
                ->join('propiedades_operatorias', 'propiedades.id', '=', 'propiedades_operatorias.propiedad')
                ->join('monedas', 'propiedades_operatorias.moneda', '=', 'monedas.id')
                ->join('estados', 'propiedades_operatorias.estado', '=', 'estados.id')
                ->where('propiedades_operatorias.operatoria', $busqueda_operatoria)
                ->paginate($paginas);
        }
        //dd($propiedades);

        // Agregar los datos para el listado de propiedades
        foreach($propiedades as $propiedad){
            $imagenes = propiedad_imagenes::all()
                ->where('propiedad', $propiedad->id)
                ->where('rol', 'P');
            //dd($imagenes);
            $propiedad->importe = $propiedad->unidad . ' ' . number_format($propiedad->importe, 0, ',', '.');
            $propiedad->estado  = $propiedad->estado_descripcion;
            if( !$imagenes->isEmpty() ) {
                $propiedad->imagen_thumb    = 'thumb_' . $imagenes[0]->nombre_archivo;
                $propiedad->imagen          = $imagenes[0]->nombre_archivo;
            }else{
                $propiedad->imagen_thumb    = 'thumb_sin_imagen.jpg';
                $propiedad->imagen          = 'sin_imagen.jpg';
            }
        }
        
        //dd($propiedades);
        return $propiedades;
    }

    static function mostrar($id_propiedad = null, $id_operatoria = null)
    {
        $where = null;
        if($id_propiedad)   $where .= " AND p.id = " . $id_propiedad;
        if($id_operatoria)  $where .= " AND po.id = " . $id_operatoria;

        // Propiedad
        $propiedad = DB::select('
            SELECT
                p.*
            FROM
                propiedades p
                LEFT OUTER JOIN propiedades_operatorias po ON p.id = po.propiedad
            WHERE 1 = 1
            ' . $where .
            ' LIMIT 1'
        )[0];
        //dd($propiedad);

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
              AND po.propiedad = ' . $propiedad->id . '
              AND po.moneda = m.id
              AND po.estado = e.id
              ' . $where
        );
        //dd($operatorias);
        foreach($operatorias as $operatoria){
            $propiedad->operatorias[] = $operatoria;
        }

        $imagenes = propiedad_imagenes::all()
            ->where('propiedad', $propiedad->id);
        //dd($imagenes);
        if($imagenes->isEmpty()){
            $propiedad->imagenes[] = 'sin_imagen.jpg';
        }else{
            // Cargar imagenes
            foreach($imagenes as $imagen){
                $propiedad->imagenes[] = $imagen->nombre_archivo;
            }
        }
        //dd($propiedad);

        return $propiedad;
    }
    
    static function guardar($request)
    {
        $propiedad = propiedades::create([
            'estado_inmueble'       => $request->get('estado_inmueble'),              // FK-Nuevo => Usado
            'fecha_publicacion'     => $request->get('fecha_publicacion'),
            'expensas'              => $request->get('expensas'),
            'habitaciones'          => $request->get('habitaciones'),
            'ambientes'             => $request->get('ambientes'),
            'toilette'              => $request->get('toilette'),
            'banos'                 => $request->get('banos'),
            'cocheras'              => $request->get('cocheras'),
            'antiguedad'            => $request->get('antiguedad'),
            'superficie_total'      => $request->get('superficie_total'),
            'superficie_cubierta'   => $request->get('superficie_cubierta'),
            'ubicacion'             => $request->get('ubicacion'),
            'ubicacion_url'         => $request->get('ubicacion_url'),            // GoogleMaps
            'localidad'             => $request->get('localidad'),
            'titulo'                => $request->get('titulo'),
            'descripcion_corta'     => $request->get('descripcion_corta'),
            'descripcion'           => $request->get('descripcion'),
            'tipo_propiedad'        => $request->get('tipo_propiedad')
        ]);

        // Operatorias
        $operatorias    = $request->get('operatoria');
        $moneda         = $request->get('moneda');
        $importes       = $request->get('importe');
        foreach($operatorias as $id => $operatoria){
            $operatoria = propiedades_operatoria::create([
                'propiedad'     => $propiedad['id'],
                'operatoria'    => $operatoria,
                'importe'       => $importes[ $id ],
                'moneda'        => $moneda[ $id ],
                'estado'        => 1       // Activo
            ]);
        }
        //dd($request->hasFile('imagen_portada'));

        // Imagenes
        //if($request->hasFile('imagen_portada')){
            $nombre = time() . $request->file('imagen_portada')->getClientOriginalName();
            // thumb
            Image::make( $request->file('imagen_portada')->getRealPath() )
                ->resize(242.48, 156.16)
                ->save('img/' . 'thumb_' . $nombre);
            Image::make( $request->file('imagen_portada')->getRealPath() )
                ->resize(1000, 644)
                ->save('img/' . $nombre);

            propiedad_imagenes::create([
                'propiedad'         => $propiedad['id'],
                'nombre_archivo'    => $nombre,
                'rol'               => 'P',   // lista
                'orden'             => 0
            ]);
        //}
        if($request->hasFile('images')){
            $i = 1;
            foreach($request->file('images') as $file) {
                $nombre = time() . $file->getClientOriginalName();
                Image::make( $file->getRealPath()  )
                    ->resize(1000, 644)
                    ->save('img/' . $nombre);

                propiedad_imagenes::create([
                    'propiedad'         => $propiedad['id'],
                    'nombre_archivo'    => $nombre,
                    'rol'               => 'L',   // lista
                    'orden'             => $i
                ]);
                $i++;
            }
        }

        if($request->has('servicios')) {
            foreach ($request->get('servicios') as $servicio) {
                propiedad_servicios::create([
                    'propiedad' => $propiedad['id'],
                    'servicio'  => $servicio
                ]);
            }
        }
        if($request->has('caracteristicas')) {
            foreach ($request->get('caracteristicas') as $caracteristica) {
                propiedad_caracteristicas::create([
                    'propiedad'         => $propiedad['id'],
                    'caracteristica'    => $caracteristica
                ]);
            }
        }
    }
    
    static function modificar($request, $id)
    {
        DB::table('propiedades')->where('propiedades.id', $id)
            ->update([
                'estado_inmueble'       => $request->get('estado_inmueble'),              // FK-Nuevo => Usado
                'fecha_publicacion'     => $request->get('fecha_publicacion'),
                'expensas'              => $request->get('expensas'),
                'habitaciones'          => $request->get('habitaciones'),
                'ambientes'             => $request->get('ambientes'),
                'toilette'              => $request->get('toilette'),
                'banos'                 => $request->get('banos'),
                'cocheras'              => $request->get('cocheras'),
                'antiguedad'            => $request->get('antiguedad'),
                'superficie_total'      => $request->get('superficie_total'),
                'superficie_cubierta'   => $request->get('superficie_cubierta'),
                'ubicacion'             => $request->get('ubicacion'),
                'ubicacion_url'         => $request->get('ubicacion_url'),            // GoogleMaps
                'localidad'             => $request->get('localidad'),
                'titulo'                => $request->get('titulo'),
                'descripcion_corta'     => $request->get('descripcion_corta'),
                'descripcion'           => $request->get('descripcion'),
                'tipo_propiedad'        => $request->get('tipo_propiedad')
            ]);
    }
}
