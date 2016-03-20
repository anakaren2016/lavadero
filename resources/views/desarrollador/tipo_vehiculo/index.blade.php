<?php $titulo = 'Tipo de vehiculo'?>
@extends('desarrollador.plantilla.base')
@section('titulo')
    <?= $titulo ?>
@endsection
@section('encabezado')
    <h4><?= $titulo ?></h4>
@endsection
@section('contenido')
    <p>Operaciones para la gestion de vehiculos</p>

    <div class="container">
        <div class="btn-group-vertical">
            <a href="{{url('/tipo_vehiculo/agregar')}}" class="btn btn-default">Agregar un nuevo tipo de vehiculo</a>
        </div>
    </div>
@endsection