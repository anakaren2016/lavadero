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

            <p class="help-block">Si no se encuentra el vehiculo <a class="btn-link"
                                                                    href="{{url('/vehiculo/formulario')}}">pulsa
                    aqui</a> para registrarlo</p>
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
        <div id="mensajes">
        </div>
        <input class="btn btn-success" type="submit" value="Registrar orden">
    </form>


    <script>
        var paginaActual = $(document);
        paginaActual.ready(cargarEvento);

        function cargarEvento() {
            $('#campo_vehiculo').change(onSelectItem_CampoVehiculo);
        }
        function onSelectItem_CampoVehiculo() {
            var url = 'http://localhost/lavadero/public/index.php/servicio/' + this.value + '/servicios.json';
            $.ajax({
                async: true,
                beforeSend: preparar,
                error: errores,
                success: completado,
                timeout: 5000,
                type: 'GET',
                url: url
            });
        }
        function preparar(p1, p2, p3, p4, p5) {
            var elementoMensajes = $('#mensajes');
            elementoMensajes.attr('class', 'alert alert-info');
            elementoMensajes.html('<p>Esperando servicios...</p>')
        }
        function errores(p1, p2, p3, p4, p5) {
            var elementoMensajes = $('#mensajes');
            elementoMensajes.attr('class', 'alert alert-danger');
            elementoMensajes.html('<p>Ocurrio un error en la peticion.</p>')
        }
        function completado(p1, p2, p3, p4, p5) {
            var elementoMensajes = $('#mensajes');
            elementoMensajes.attr('class', 'alert alert-success');
            elementoMensajes.html('<p>Servicios cargados</p>');

            var tabla = $('#tabla_contenido');
            tabla.find('tr').remove().end();
            var contenido = '';
            for (var i = 0; i < p1.length; i++) {
                contenido += '<tr>';
                contenido += '<td><input type="checkbox" name="id_servicios[]" value="' + p1[i].id + '" </td>';
                contenido += '<td>';
                contenido += p1[i].descripcion;
                contenido += '</td>';
                contenido += '<td>';
                contenido += p1[i].tiempo_estimado;
                contenido += '</td>';
                contenido += '<td>';
                contenido += p1[i].precio;
                contenido += '</td>';
                contenido += '</tr>';
            }
            tabla.html(contenido);
        }
    </script>
@endsection