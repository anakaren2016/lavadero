@extends('desarrollador.plantilla.base')
@section('titulo')
    Registros clientes
@endsection

@section('encabezado')
    <h3>
        <a class="btn btn-default" href="{{url('/cliente')}}">Volver</a>
        Clientes registrados
    </h3>
@endsection

@section('contenido')
    @if(isset($lista) and count($lista)>0)
        <table class="table table-bordered">
            <thead>
            <th>Codigo</th>
            <th>Nombre del cliente</th>
            <th>Numero de carnet</th>
            <th></th>
            </thead>
            <tbody>
            @foreach($lista as $item)
                <tr>
                    <td class="table-text">{{$item->id}}</td>
                    <td class="table-text">{{$item->nombre}}</td>
                    <td class="table-text">{{$item->ci}}</td>
                    <td>
                        <form method="post" action="{{url('/cliente/visualizar')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="accion" value="ver">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input class="btn btn-primary" type="submit" value="Ver">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            No hay clientes registrados.
        </div>
    @endif
@endsection