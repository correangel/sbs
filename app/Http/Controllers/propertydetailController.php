<?php

namespace App\Http\Controllers;

use App\caracteristicas;
use App\estados;
use App\estados_inmuebles;
use App\monedas;
use App\operatorias;
use App\propiedad_caracteristicas;
use App\propiedad_imagenes;
use App\propiedades;
use App\propiedades_operatoria;
use App\propiedades_tipos;
use App\servicios;
use App\propiedad_servicios;

use App\Http\Requests;

class propertydetailController extends Controller
{
    /*
    function lista()
    {
        // Obtener datos para filtros
        $tipos_propiedad    = propiedades_tipos::all();
        $filtro_tipos_propiedad[ '-1' ] = "Tipo de propiedad";
        foreach($tipos_propiedad as $tipo){
            $filtro_tipos_propiedad[ $tipo['id'] ] = $tipo['descripcion'];
        }
        $operatorias        = operatorias::all();
        foreach($operatorias as $operatoria){
            $filtro_operatoria[ $operatoria['id'] ] = $operatoria['descripcion'];
        }
        $estados_inmuebles = estados_inmuebles::all();
        foreach($estados_inmuebles as $estado_inmueble){
            $filtro_estado_inmueble[ $estado_inmueble['id'] ] = $estado_inmueble['descripcion'];
        }

        //---- LISTA DE PROPIEDADES -----------------------
        $propiedades = propiedades::buscar( request(), 6);
        //dd($propiedades);
        //---- FIN LISTA DE PROPIEDADES --------------------

        //---- DESTACADOS ---------------------------
        $propiedades_destacadas = propiedades::buscar( request(), 4 );
        //dd($propiedades_destacadas);
        //---- FIN DESTACADOS -----------------------

        $datos_vista = compact(
            'propiedades', 
            'propiedades_destacadas', 
            'filtro_tipos_propiedad', 
            'filtro_operatoria', 
            'filtro_estado_inmueble'
        );
        return view('sbs/property-detail', $datos_vista);
    }
    */

    function mostrar($id)
    {
        $propiedad = propiedades::mostrar(null, $id);
        //dd($propiedades);
        //---- DESTACADOS ---------------------------
        $propiedades_destacadas = propiedades::buscar( request(), 4);
        //dd($propiedades_destacadas);
        //---- FIN DESTACADOS -----------------------
        
        $datos_vista = compact(
            'propiedad',
            'propiedades_destacadas'
        );
        return view('sbs/property-detail', $datos_vista);
    }
}
