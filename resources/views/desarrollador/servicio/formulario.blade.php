@extends('desarrollador.plantilla.base')
@section('titulo')
    Servicios
@endsection
@section('encabezado')
    <h3>Registro de nuevo servicio</h3>
@endsection
@section('contenido')
    @include('desarrollador.errores.plantilla')
    <form action="{{url('/servicio/registro')}}"
          method="post"
          role="form">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="campo-descripcion">
                Descripci&oacute;n:
            </label>
            <input type="text"
                   name="descripcion"
                   id="campo-descripcion"
                   placeholder="Limpieza de motor"
                   class="form-control">

            <p class="help-block">
                Descripci&oacute;n o nombre para el servicio.
            </p>
        </div>
        <div class="form-group">
            <label for="campo-tiempo-estimado">
                Tiempo estimado (minutos):
            </label>
            <input type="text"
                   name="tiempo_estimado"
                   id="campo-tiempo-estimado"
                   placeholder="1, 2, 3"
                   class="form-control">

            <p class="help-block">
                Es el tiempo que se demora en realizar el servicio.
            </p>
        </div>
        <div class="form-group">
            <label for="campo-precio">
                Precio o costo del servicio (Bs.):
            </label>
            <input type="text"
                   name="precio"
                   id="campo-precio"
                   placeholder="100.00"
                   class="form-control">

            <p class="help-block">
                Es el precio que se debe pagar por el servicio.
            </p>
        </div>
        <div class="form-group">
            <label for="campo-tipo-vehiculo">
                El servicio es para vehiculos de tipo:
            </label>
            <select class="form-control"
                    name="id_tipo_vehiculo"
                    id="campo-tipo-vehiculo">
                <option></option>
                @if(isset($tipo_vehiculo))
                    @foreach($tipo_vehiculo as $item)
                        <option class="item"
                                value="{{$item['id']}}">
                            {{ $item['nombre'] }}
                        </option>
                    @endforeach
                @endif
            </select>

            <p class="help-block">
                Defina para que tipo de veh&iacute;culo se brindar&aacute; este servicio.
            </p>
        </div>
        <input type="submit"
               class="btn btn-success"
               value="Registrar servicio">
    </form>
@endsection