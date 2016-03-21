@extends('desarrollador.plantilla.base')
@section('titulo')
    Vehiculo
@endsection
@section('encabezado')
    <h3>Datos del vehiculo</h3>
@endsection
@section('contenido')
    <ul class="list-group">
        <li class="list-group-item">
            <span style="font-weight: bold">
                N&uacute;mero de registro:
            </span>
            {{ $vehiculo['id'] }}
        </li>
        <li class="list-group-item">
            <span style="font-weight: bold">
                N&uacute;mero de placa:
            </span>
            {{ $vehiculo['placa'] }}
        </li>
        <li class="list-group-item">
            <span style="font-weight: bold">
                Propietario/Cliente:
            </span>
            {{ $cliente['nombre'] }}
        </li>
        <li class="list-group-item">
            <span style="font-weight: bold">
                Tipo de vehiculo:
            </span>
            {{ $tipo_vehiculo['nombre'] }}
        </li>
    </ul>
@endsection
