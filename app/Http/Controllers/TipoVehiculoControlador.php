<?php
namespace App\Http\Controllers;


use App\TipoVehiculo;
use Illuminate\Http\Request;

class TipoVehiculoControlador extends Controller
{
    public function index()
    {
        return view('desarrollador.tipo_vehiculo.index');
    }

    public function agregar(Request $request)
    {

        switch ($request->method()) {
            case 'GET': {
                $accion = ['agregar' => true];
                return view('desarrollador.tipo_vehiculo.formulario', ['accion' => $accion]);
            }
            case 'POST': {
                $this->validate(
                    $request,
                    [
                        'nombre' => 'required',
                        'descripcion' => 'required'
                    ]
                );
                $entidad = \App\TipoVehiculo::create(['nombre' => $request->nombre, 'descripcion' => $request->descripcion]);
                $accion = ['registrado' => true];
                if ($entidad->save()) {
                    return view(
                        'desarrollador.tipo_vehiculo.visualizar',
                        [
                            'entidad' => $entidad,
                            'accion' => $accion
                        ]
                    );
                }
            }
        }
    }

    public function prueba()
    {
        $entidad = TipoVehiculo::find(0);
        $accion = array('visualizar' => true);
        return view(
            'desarrollador.tipo_vehiculo.visualizar',
            [
                'entidad' => $entidad,
                'accion' => $accion
            ]
        );
    }
}