@extends('desarrollador.plantilla.base')
@section('titulo')
    Ver cliente
@endsection
@section('encabezado')
    <h3>Datos del cliente</h3>
@endsection
@section('contenido')
    @if(isset($entidad))
        <table class="table">
            <tr>
                <th>Codigo:</th>
                <td>{{$entidad->id}}</td>
            </tr>
            <tr>
                <th>Nombre completo:</th>
                <td>{{$entidad->nombre}}</td>
            </tr>
            <tr>
                <th>Telefono:</th>
                <td>{{$entidad->telefono}}</td>
            </tr>
            <tr>
                <th>Direccion:</th>
                <td>{{$entidad->direccion}}</td>
            </tr>
            <tr>
                <th>Carnet de identidad:</th>
                <td>{{$entidad->ci}}</td>
            </tr>
        </table>

        @if(isset($banderas['ver']))
            <div class="container">
                <a class="btn btn-success">Editar</a>
                <a class="btn btn-danger">Eliminar</a>
            </div>
        @endif
        @if(isset($banderas['nuevo']))
            <div class="container">
                <a class="btn btn-success">Agregar otro cliente</a>
            </div>
        @endif
    @else
        <div class="alert alert-info">No hay nada que mostrar.</div>
    @endif
@endsection