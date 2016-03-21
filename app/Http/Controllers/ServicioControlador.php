<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21-03-16
 * Time: 10:48 AM
 */

namespace App\Http\Controllers;


use App\Servicio;
use App\TipoVehiculo;
use Illuminate\Http\Request;

class ServicioControlador extends Controller
{
    public function formulario()
    {
        $tipo_vehiculo = TipoVehiculo::where('eliminado', false)->get();
        return view('desarrollador.servicio.formulario',
            [
                'tipo_vehiculo' => $tipo_vehiculo
            ]);
    }

    public function registro(Request $request)
    {
        $this->validate($request, [
            'id_tipo_vehiculo' => 'required',
            'precio' => 'required',
            'tiempo_estimado' => 'required',
            'descripcion' => 'required|max:100'
        ]);
        $entidad = Servicio::create([
            'descripcion' => $request->descripcion,
            'tiempo_estimado' => $request->tiempo_estimado,
            'precio' => $request->precio,
            'id_tipo_vehiculo' => $request->id_tipo_vehiculo
        ]);

        if ($entidad->save()) {
            $tipo_vehiculo = TipoVehiculo::find($entidad['id_tipo_vehiculo']);
            return view('desarrollador.servicio.visualizar',
                [
                    'servicio' => $entidad,
                    'tipo_vehiculo' => $tipo_vehiculo
                ]);
        }
    }
}