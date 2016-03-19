<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    public function agregar(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('desarrollador.cliente.agregar');
        } else {
            $this->validate(
                $request,
                [
                    'nombre' => 'required',
                    'telefono' => 'required',
                    'ci' => 'required'
                ]
            );
            $entidad = \App\Cliente::create([
                'nombre' => $request->nombre,
                'telefono' => $request->telefono,
                'direccion' => $request->direccion,
                'ci' => $request->ci
            ]);
            return view('desarrollador.cliente.visualizar', ['entidad' => $entidad]);
        }
    }

    public function index()
    {
        return view('desarrollador.cliente.index');
    }

    public function listar()
    {
        $registros = \App\Cliente::all();
        return view('desarrollador.cliente.listar', ['lista' => $registros]);
    }

    public function visualizar(Request $request)
    {
        $entidad = \App\Cliente::find($request->id);
        $banderas = array();
        if (isset($request->accion)) {
            switch ($request->accion) {
                case 'ver': {
                    $banderas['ver'] = true;
                    break;
                }
            }
        }
        return view('desarrollador.cliente.visualizar', ['entidad' => $entidad, 'banderas' => $banderas]);
    }
}
