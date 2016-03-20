@section('seccion_registrado')
    <a class="btn btn-primary" href="/tipo_vehiculo">Volver a la secci&oacute;n principal</a>
    <a class="btn btn-warning" href="/tipo_vehiculo/agregar">Realizar otro registro</a>
@endsection
@section('seccion_visualizar')
    <a class="btn btn-success" href="/tipo_vehiculo/editar">Editar</a>
    <a class="btn btn-danger" href="/tipo_vehiculo/eliminar">Eliminar</a>
@endsection

@extends('desarrollador.plantilla.base')

@section('titulo')
    Visualizar tipo de vehiculo
@endsection
@section('encabezado')
    <h3>Datos del tipo de vehiculo</h3>
@endsection
@section('contenido')
    <table class="table table-bordered table-responsive">
        <tr>
            <th>C&oacute;digo</th>
            <td>{{$entidad->id}}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{$entidad->nombre}}</td>
        </tr>
        <tr>
            <th>Descripci&oacute;n</th>
            <td>{{$entidad->descripcion}}</td>
        </tr>
    </table>

    @if(isset($accion))
        @if (isset($accion['registrado']))
            @yield('seccion_registrado')
        @else
            @yield('seccion_visualizar')
        @endif
    @endif
@endsection