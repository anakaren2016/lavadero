@extends('desarrollador.plantilla.base')
@section('titulo')
    Orden de trabajo
@endsection
@section('encabezado')
    <h3>Orden de trabajo</h3>

    <h5>{{Carbon\Carbon::now()->format('H:i d/m/Y')}}</h5>
@endsection
@section('contenido')
    <div class="panel panel-default">
        <div class="panel-body">
            <p><span style="font-weight: bold">Orden:</span> {{$orden->id}}</p>
            <br>

            <p><span style="font-weight: bold">Cliente/Propietario:</span> {{$cliente->nombre}}</p>

            <p><span style="font-weight: bold">C.I.:</span> {{$cliente->ci}}</p>
            <br>

            <p><span style="font-weight: bold">Tipo de vehiculo:</span> {{$tipoVehiculo->nombre}}</p>

            <p><span style="font-weight: bold">Nro. de placa:</span> {{$vehiculo->placa}}</p>

            <p><span style="font-weight: bold">Servicios solicitados:</span></p>
            <table border="1" class='table'>
                <tbody>
                <th>Descripcion del servicio</th>
                <th>Tiempo (Minutos)</th>
                <th>Costo (Bs.)</th>
                </tbody>
                @foreach($servicios as $item)
                    <tr>
                        <td class='table-text'>{{$item->descripcion}}</td>
                        <td class='table-text'>{{$item->tiempo_estimado}}</td>
                        <td class='table-text'>{{$item->precio}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Cantidad {{count($servicios)}}</td>
                    <td>{{$totalTiempo}} minutos</td>
                    <td>Bs. {{$totalPrecio}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection