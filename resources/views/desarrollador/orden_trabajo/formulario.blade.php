@extends('desarrollador.plantilla.base')
@section('titulo')
    Orden de trabajo
@endsection
@section('encabezado')
    <h3>Orden de trabajo</h3>
@endsection
@section('contenido')
    <form role="form" method="post" action="{{url('/orden_trabajo/registro')}}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="campo_vehiculo">
                Vehiculos registrados:
            </label>
            <select id="campo_vehiculo"
                    class="form-control"
                    name="id_vehiculo">
                <option></option>
                @foreach($vehiculos as $item)
                    <option value="{{$item->id}}">
                        {{$item->placa}} - {{$item->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="campo_servicio">
                Servicios:
            </label>

            <table class="table" id="campo_servicio"></table>
        </div>
        <input class="btn btn-success" type="submit" value="Registrar orden">
    </form>
    <script>
        $(document).ready(function ($) {
            $('#campo_vehiculo').change(function () {
                $.get('/servicio/' + this.value + '/servicios.json', function (cities) {
                    var $state = $('#campo_servicio');
                    $state.find('tr').remove().end();
                    $(cities).each(function (city) {
                        $state.append('<tr><td><input type="checkbox" name="id_servicios[]" value="' + this.id + '">' + this.descripcion + '<br></td></tr>');
                    });
                });
            });
        });
    </script>
@endsection