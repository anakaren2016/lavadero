@section('seccion_editar')
    <input class="btn btn-success"
           type="submit"
           value="Guardar cambios">
    <a class="btn btn-danger"
       href="{{URL::previous()}}">
        Cancelar
    </a>
@endsection
@section('seccion_agregar')
    <input class="btn btn-success"
           type="submit"
           value="Agregar">
    <input class="btn btn-info"
           type="reset"
           value="Limpiar">
@endsection

<?php
$titulo = '';
$titulo_encabezado = '';
$url_destino_formulario = '';
if (isset($accion)) {
    if (isset($accion['agregar'])) {
        $titulo = 'Nuevo registro';
        $titulo_encabezado = 'Registrar nuevo tipo de vehiculo';
        $url_destino_formulario = '/tipo_vehiculo/agregar';
    }
}
?>
@extends('desarrollador.plantilla.base')
@section('titulo')
    <?= $titulo ?>
@endsection
@section('encabezado')
    <h3><?= $titulo_encabezado ?></h3>
@endsection
@section('contenido')
    @include('desarrollador.errores.plantilla')
    <form role="form"
          action="<?= url($url_destino_formulario)?>"
          method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="column-nombre">
                Nombre:
            </label>
            <input type="text"
                   class="form-control"
                   id="column-nombre"
                   name="nombre"
                   placeholder="Camion, camioneta, vagoneta, etc."
                   value="{{(isset($entidad->nombre))?$entidad->nombre:null}}">

            <p class="help-block">
                Es el nombre para identificar el tipo de vehiculo.
            </p>
        </div>
        <div class="form-group">
            <label for="column-descripcion">
                Descripcion:
            </label>
            <input type="text"
                   class="form-control"
                   id="column-descripcion"
                   name="descripcion"
                   placeholder="Vehiculo compacto"
                   value="{{(isset($entidad->descripcion))?$entidad->descripcion:null}}">

            <p class="help-block">
                Una descripci&oacute;n breve para la categor&iacute;a.
            </p>
        </div>
        @if (isset($accion))
            @if (isset($accion['editar']))
                @yield('seccion_editar')
            @elseif(isset($accion['agregar']))
                @yield('seccion_agregar')
            @endif
        @endif
    </form>
@endsection

