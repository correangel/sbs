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

class propiedadesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function lista()
    {
        $propiedades = propiedades::paginate(10);
        //dd($propiedades);
        return view('propiedades/lista', compact('propiedades'));
    }

    function crear()
    {
        //--- VALORES PARA COMBOS -------
        $valores_combos         = $this->get_valores_combos();
        $combo_estados          = $valores_combos['estados'];
        $combo_estados_inmueble = $valores_combos['estados_inmueble'];
        $combo_tipos_propiedad  = $valores_combos['tipos_propiedad'];
        $combo_servicios        = $valores_combos['servicios'];
        $combo_caracteristicas  = $valores_combos['caracteristicas'];
        $combo_operatorias      = $valores_combos['operatorias'];
        $combo_monedas          = $valores_combos['monedas'];

        return view('propiedades/crear', compact(
            'combo_estados',
            'combo_estados_inmueble',
            'combo_tipos_propiedad',
            'combo_servicios',
            'combo_caracteristicas',
            'combo_operatorias',
            'combo_monedas'
        ));
    }

    function guardar()
    {
        $this->validate(request(), [
            'descripcion' => ['required'],
        ]);

        propiedades::guardar(Request());

        return redirect()->to('propiedades');
    }

    function modificar($id)
    {
        //dd(request());
        propiedades::modificar(Request(), $id);

        return redirect()->to('propiedades');
    }

    function mostrar($id)
    {
        $propiedad = propiedades::mostrar($id);
        //dd($propiedad);
        
        //--- VALORES PARA COMBOS -------
        $valores_combos         = $this->get_valores_combos();
        $combo_estados          = $valores_combos['estados'];
        $combo_estados_inmueble = $valores_combos['estados_inmueble'];
        $combo_tipos_propiedad  = $valores_combos['tipos_propiedad'];
        $combo_servicios        = $valores_combos['servicios'];
        $combo_caracteristicas  = $valores_combos['caracteristicas'];
        $combo_operatorias      = $valores_combos['operatorias'];
        $combo_monedas          = $valores_combos['monedas'];

        return view('propiedades/editar', compact(
            'propiedad',
            'combo_estados',
            'combo_estados_inmueble',
            'combo_tipos_propiedad',
            'combo_servicios',
            'combo_caracteristicas',
            'combo_operatorias',
            'combo_monedas'
        ));
    }

    function get_valores_combos()
    {
        $estados            = estados::all();
        $estados_inmueble   = estados_inmuebles::all();
        $tipos_propiedad    = propiedades_tipos::all();
        $servicios          = servicios::all();
        $caracterisitcas    = caracteristicas::all();
        $operatorias        = operatorias::all();
        $monedas            = monedas::all();

        foreach($estados as $estado){
            $datos['estados'][ $estado['id'] ] = $estado['descripcion'];
        }
        foreach($estados_inmueble as $estado){
            $datos['estados_inmueble'][ $estado['id'] ] = $estado['descripcion'];
        }
        foreach($tipos_propiedad as $tipo){
            $datos['tipos_propiedad'][ $tipo['id'] ] = $tipo['descripcion'];
        }
        foreach($servicios as $servicio){
            $datos['servicios'][ $servicio['id'] ] = $servicio['descripcion'];
        }
        foreach($caracterisitcas as $caracteristica){
            $datos['caracteristicas'][ $caracteristica['id'] ] = $caracteristica['descripcion'];
        }
        foreach($operatorias as $operatoria){
            $datos['operatorias'][ $operatoria['id'] ] = $operatoria['descripcion'];
        }
        foreach($monedas as $moneda){
            $datos['monedas'][ $moneda['id'] ] = $moneda['descripcion'];
        }
        return $datos;
    }
}
