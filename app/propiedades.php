<?php
namespace App;

ini_set('upload_max_filesize', '20M');

use App\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


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
		foreach($imagenes as $imagen){
	               $propiedad->imagen_thumb    = 'thumb_' . $imagen->nombre_archivo;
        	        $propiedad->imagen          = $imagen->nombre_archivo;
		}
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
        $operatorias = propiedades_operatoria::get_operatorias($propiedad->id, $id_operatoria);
        //dd($operatorias);
        foreach($operatorias as $operatoria){
            $propiedad->operatorias[] = $operatoria;
        }

        // IMAGENES
        $imagenes = propiedad_imagenes::get_imagenes($propiedad->id);
        //dd($imagenes);
        if( !$imagenes->isEmpty() ){
            // Cargar imagenes
            foreach($imagenes as $imagen){
                $propiedad->imagenes[] = $imagen;
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
        $operatorias        = $request->get('operatoria');
        $moneda             = $request->get('moneda');
        $importes           = $request->get('importe');
        $operatoria_estado  = $request->get('operatoria_estado');
        foreach($operatorias as $id_op => $operatoria){
            $operatoria = propiedades_operatoria::create([
                'propiedad'     => $propiedad['id'],
                'operatoria'    => $operatoria,
                'importe'       => $importes[ $id_op ],
                'moneda'        => $moneda[ $id_op ],
                'estado'        => $operatoria_estado[ $id_op ]
            ]);
        }
        //dd($request->hasFile('imagen_portada'));

        // IMAGENES
        if($request->file('imagen_portada')){
            propiedad_imagenes::guardar_imagen_principal($request->file('imagen_portada'), $propiedad['id']);
        }
        if($request->hasFile('images')){
            propiedad_imagenes::guardar_imagenes($request->file('images'), $propiedad['id']);
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

        // IMAGENES
        if($request->file('imagen_portada')){
            propiedad_imagenes::guardar_imagen_principal($request->file('imagen_portada'), $id);
        }
        if($request->hasFile('images')) {
            propiedad_imagenes::guardar_imagenes($request->file('images'), $id);
        }

        $imagenes = propiedad_imagenes::get_imagenes($id);
        // Eliminar imagenes
        foreach($imagenes as $id => $imagen){
            if($request->has('imagen_checkbox_' . $imagen->id)) {
                if ($request->get('imagen_checkbox_' . $imagen->id) == 1) {
                    propiedad_imagenes::find($imagen->id)->delete();
                    File::Delete('img/' . $imagen->nombre_archivo);
                }
            }
        }

        // OPERATORIAS
        $operatorias    = $request->get('operatoria');
        //dd($operatorias);
        $id_operatoria      = $request->get('id_operatoria');
        $moneda             = $request->get('moneda');
        $importes           = $request->get('importe');
        $operatoria_estado  = $request->get('operatoria_estado');
        foreach($operatorias as $id_op => $operatoria){
            // Verificar si es alta o modificacion
            $existe = null;
            if(isset($id_operatoria[ $id_op ])) {
                $existe = propiedades_operatoria::get_operatorias($id, $id_operatoria[$id_op]);
                //dd($existe);
            }
            if($existe) {
                DB::table('propiedades_operatorias')->where('id', $id_operatoria[$id_op])
                    ->update([
                        'operatoria'    => $operatoria,
                        'importe'       => $importes[$id_op],
                        'moneda'        => $moneda[$id_op],
                        'estado'        => $operatoria_estado[ $id_op ]
                    ]);
            }else{
                propiedades_operatoria::create([
                    'propiedad'     => $id,
                    'operatoria'    => $operatoria,
                    'importe'       => $importes[ $id_op ],
                    'moneda'        => $moneda[ $id_op ],
                    'estado'        => $operatoria_estado[ $id_op ]
                ]);
            }
        }
    }
}
