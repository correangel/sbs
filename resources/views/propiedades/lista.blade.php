@extends('layouts.app')

@section('content')
<div>
    <p>
        <a href="{{ 'propiedades/crear' }}">Crear nuevo</a>
    </p>
</div>
<table class="table table-bordered table-inverse">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Ubicación</th>
            <th>Localidad</th>
            <th>Fecha Public.</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($propiedades as $propiedad)
        <tr class="table-active">
            <td class="table-active">{{ $propiedad->titulo }}</td>
            <td class="table-active">{{ $propiedad->ubicacion }}</td>
            <td class="table-active">{{ $propiedad->localidad }}</td>
            <td class="table-active">{{ $propiedad->fecha_publicacion }}</td>
            <td class="table-responsive"><button class="btn btn-toolbar"  onclick="window.location.href='propiedades/{{ $propiedad->id }}'">Editar</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
    {!! $propiedades->render() !!}
@endsection