@extends('desarrollador.plantilla.base')
@section('titulo')
    Servicio
@endsection
@section('encabezado')
    <h3>Datos del servicio</h3>
@endsection
@section('contenido')
    <ul class="list-group">
        <li class="list-group-item">
            <span style="font-weight: bold">
                N&uacute;mero de registro:
            </span>
            {{ $servicio['id'] }}
        </li>
        <li class="list-group-item">
            <span style="font-weight: bold">
                Descripci&oacute;n:
            </span>
            {{ $servicio['descripcion'] }}
        </li>
        <li class="list-group-item">
            <span style="font-weight: bold">
                Tipo de veh&iacute;culos:
            </span>
            {{ $tipo_vehiculo['nombre'] }}
        </li>
        <li class="list-group-item">
            <span style="font-weight: bold">
                Tiempo estimado:
            </span>
            {{ $servicio['tiempo_estimado'] }}
        </li>
        <li class="list-group-item">
            <span style="font-weight: bold">
                Precio:
            </span>
            {{ $servicio['precio'] }}
        </li>
    </ul>
@endsection