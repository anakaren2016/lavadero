@extends('desarrollador.plantilla.base')

@section('titulo')
    Clientes
@endsection

@section('encabezado')
    <h3>Clientes</h3>
@endsection

@section('contenido')
    <span>Esta es la pagina para la gestion de un cliente, permite el registro, modificacion y eliminacion de un cliente.</span>
    <br><br>
    <span>Elija una opci&oacute;n para empezar:</span><br>
    <div class="btn-group-vertical">
        <a class="btn btn-default" href="{{url('/cliente/agregar')}}">Agregar un nuevo cliente</a>
        <a class="btn btn-default" href="{{url('/cliente/clientes')}}">Visualizar lista de clientes</a>
    </div>
@endsection