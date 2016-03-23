<?php
namespace App\Http\Controllers;


use App\Cliente;
use App\DetalleOrden;
use App\OrdenTrabajo;
use App\Servicio;
use App\TipoVehiculo;
use App\Vehiculo;
use Illuminate\Http\Request;

class OrdenTrabajoControlador extends Controller
{
    public function formulario()
    {
        $vehiculos = Vehiculo::where('vehiculo.eliminado', false)->leftJoin('cliente', 'vehiculo.id_cliente', '=', 'cliente.id')->get(['vehiculo.id', 'placa', 'vehiculo.id_tipo_vehiculo', 'cliente.nombre']);
        $id = OrdenTrabajo::all()->last()['id'] + 1;
        return view('desarrollador.orden_trabajo.formulario',
            [
                'vehiculos' => $vehiculos,
                'id_orden' => $id
            ]);
    }

    function registro(Request $request)
    {
        $vehiculo = Vehiculo::find($request->id_vehiculo);
        $tipo_vehiculo = TipoVehiculo::find($vehiculo['id_tipo_vehiculo']);
        $cliente = Cliente::find($vehiculo['id_cliente']);
        $servicios = Servicio::find($request->id_servicios);
        $totalTiempo = 0;
        $totalPrecio = 0;
        foreach ($servicios as $item) {
            $totalPrecio += $item['precio'];
            $totalTiempo += $item['tiempo_estimado'];
        }
        $orden = OrdenTrabajo::create([
            'placa' => $vehiculo['placa'],
            'total' => $totalPrecio,
            'tiempo' => $totalTiempo
        ]);

        foreach ($servicios as $item) {
            DetalleOrden::create([
                'id_orden' => $orden['id'],
                'id_servicio' => $item['id']
            ]);
        }

        return view('desarrollador.orden_trabajo.visualizar',
            [
                'orden' => $orden,
                'cliente' => $cliente,
                'tipoVehiculo' => $tipo_vehiculo,
                'vehiculo' => $vehiculo,
                'servicios' => $servicios,
                'totalTiempo' => $totalTiempo,
                'totalPrecio' => $totalPrecio
            ]);
    }
}