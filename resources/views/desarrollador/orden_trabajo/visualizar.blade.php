@if(is_array($orden->fecha_hora))
    @foreach($orden->fecha_hora as $k=>$item)
        <p>{{$k}} => {{$item}}</p>
    @endforeach
@endif

<p>Orden: {{$orden->id}}</p>
<p>Fecha: {{date('d/M/Y H:m',$orden['fecha_hora'])}}</p>
<br>
<p>Cliente/Propietario: {{$cliente->nombre}}</p>
<p>C.I.: {{$cliente->ci}}</p>
<br>
<p>Tipo de vehiculo: {{$tipoVehiculo->nombre}}</p>
<p>Nro. de placa: {{$vehiculo->placa}}</p>

<p>Servicios solicitados:</p>
<table border="1">
    <tr>
        <th>Descripcion del servicio</th>
        <th>Tiempo (Minutos)</th>
        <th>Costo (Bs.)</th>
    </tr>
    @foreach($servicios as $item)
        <tr>
            <td>{{$item->descripcion}}</td>
            <td>{{$item->tiempo_estimado}}</td>
            <td>{{$item->precio}}</td>
        </tr>
    @endforeach
    <tr>
        <td>Cantidad {{count($servicios)}}</td>
        <td>{{$totalTiempo}} minutos</td>
        <td>Bs. {{$totalPrecio}}</td>
    </tr>
</table>