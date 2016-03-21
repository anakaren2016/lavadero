@extends('desarrollador.plantilla.base')
@section('titulo')
    Nuevo vehiculo
@endsection

@section('encabezado')
    <h3>
        Registro de nuevo vehiculo
    </h3>
@endsection

@section('contenido')
    @include('desarrollador.errores.plantilla')

    <form role="form" method="post" action="{{url('/vehiculo/registro')}}">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="campo_tipo_vehiculo">
                Selecci&oacute;n de tipo de vehiculo:
            </label>
            <select class="form-control"
                    id="campo_tipo_vehiculo"
                    name="id_tipo_vehiculo">
                <option></option>
                @if(isset($tipo_vehiculo))
                    @foreach($tipo_vehiculo as $item)
                        <option value="{{$item['id']}}">
                            {{$item['nombre']}}
                        </option>
                    @endforeach
                @endif
            </select>

            <p class="help-block">
                Selecciona una clasificaci&oacute;n para el vehiculo.<br>
                Si no figura una categor&iacute;a apropiada pulsa
                <a href="{{url('/tipo_vehiculo/agregar')}}"
                   class="btn-link">
                    click aqu&iacute;
                </a>
                para registrar una.
            </p>
        </div>
        <div class="form-group">
            <label for="campo_clientes">
                Selecci&oacute;n al cliente/propietario:
            </label>
            <select class="form-control"
                    id="campo_clientes"
                    name="id_cliente">
                <option></option>
                @if(isset($clientes))
                    @foreach($clientes as $item)
                        <option value="{{$item['id']}}">
                            {{ $item['ci']. ' - ' . $item['nombre']}}
                        </option>
                    @endforeach
                @endif
            </select>

            <p class="help-block">
                Selecciona un cliente/propietario para el vehiculo.<br>
                Si no figura el cliente/propietario deseado pulsa
                <a href="{{url('/cliente/agregar')}}"
                   class="btn-link">
                    click aqu&iacute;
                </a>
                para registrarlo.
            </p>
        </div>
        <div class="form-group">
            <label for="campo_placa">
                N&uacute;mero de placa:
            </label>
            <input type="text"
                   class="form-control"
                   id="campo_placa"
                   name="placa"
                   placeholder="1234-ABC">

            <p class="help-block">
                Numero de placa del vehiculo que se esta registrando.
            </p>
        </div>
        <input type="submit"
               value="Crear registro"
               class="btn btn-success">
    </form>
@endsection