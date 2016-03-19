@extends('desarrollador.plantilla.base')
@section('titulo')
    Nuevo cliente
@endsection
@section('encabezado')

    <h3>
        <a class="btn btn-default" href="{{url('/cliente/')}}"> &lt; Volver</a>
        Registrar nuevo cliente
    </h3>

@endsection
@section('contenido')
    @include('desarrollador.errores.plantilla')
    <form method="post" action="{{url('/cliente/agregar')}}" role="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="campo_nombre">Nombres y apellidos:</label>
            <input class="form-control" type="text" name="nombre" id="campo_nombre">
            <label for="campo_telefono">Tel&eacute;fono:</label>
            <input class="form-control" type="text" name="telefono" id="campo_telefono">
            <label for="campo_direccion">Direcci&oacute;n:</label>
            <input class="form-control" type="text" name="direccion" id="campo_direccion">
            <label for="campo_carnet">N&uacute;mero de carnet:</label>
            <input class="form-control" type="text" name="ci" id="campo_carnet">
        </div>
        <input class="btn btn-success" type="submit" value="Confirmar">
        <input class="btn btn-info" type="reset" value="Limpiar">

    </form>

@endsection