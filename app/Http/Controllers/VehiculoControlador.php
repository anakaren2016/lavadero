<?php
namespace App\Http\Controllers;

use App\Cliente;
use App\TipoVehiculo;
use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoControlador extends Controller
{
    public function index()
    {
        $tipo_vehiculos = TipoVehiculo::where('eliminado', false)->get();
        $clientes = Cliente::where('eliminado', false)->get();
        return view(
            'desarrollador.vehiculo.formulario',
            [
                'tipo_vehiculo' => $tipo_vehiculos,
                'clientes' => $clientes
            ]
        );
    }

    public function registrarNuevoVehiculo(Request $request)
    {
        $this->validate(
            $request,
            [
                'id_tipo_vehiculo' => 'required',
                'id_cliente' => 'required',
                'placa' => 'required|max:8'
            ]
        );
        $entidad = Vehiculo::create([
            'id_tipo_vehiculo' => $request->id_tipo_vehiculo,
            'id_cliente' => $request->id_cliente,
            'placa' => $request->placa
        ]);
        if ($entidad->save()) {
            $cliente = Cliente::find($request->id_cliente);
            $tipo_vehiculo = TipoVehiculo::find($request->id_tipo_vehiculo);
            return view(
                'desarrollador.vehiculo.visualizar',
                [
                    'vehiculo' => $entidad,
                    'tipo_vehiculo' => $tipo_vehiculo,
                    'cliente' => $cliente
                ]);
        } else {
            return 'Error';
        }
    }
}