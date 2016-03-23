@extends('desarrollador.plantilla.base')
@section('titulo')
    Orden de trabajo
@endsection
@section('encabezado')
    <h3>Orden de trabajo</h3>

    <h5>{{Carbon\Carbon::now()->format('H:i d/m/Y')}}</h5>
@endsection
@section('contenido')
    @include('desarrollador.errores.plantilla')
    <form role="form" method="post" action="{{url('/orden_trabajo/registro')}}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="campo_id">
                Numero de orden:
            </label>
            <input id="campo_id"
                   class="form-control"
                   name="id"
                   value={{$id_orden}}
                           readonly>
        </div>
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
            <table class="table" id="campo_servicio">
                <thead>
                <th>Solicitar</th>
                <th>Descripcion del servicio</th>
                <th>Tiempo estimado (minutos)</th>
                <th>Precio (Bs.)</th>
                </thead>
                <tbody id="tabla_contenido"></tbody>
            </table>
        </div>
        <input class="btn btn-success" type="submit" value="Registrar orden">
    </form>
    <script>
        $(document).ready(function ($) {
            $('#campo_vehiculo').change(function () {
                $.get('/servicio/' + this.value + '/servicios.json', function (cities) {
                    var $state = $('#tabla_contenido');
                    $state.find('tr').remove().end();
                    $(cities).each(function (city) {
                        $state.append('<tr><td class="table_text"><input type="checkbox" name="id_servicios[]" value="' + this.id + '"></td><td>' + this.descripcion + '</td><td>' + this.tiempo_estimado + '</td><td>' + this.precio + '</td></tr>');
                    });
                });
            });
        });
    </script>
@endsection