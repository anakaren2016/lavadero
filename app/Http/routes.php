<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicio/{codigo}/servicios.json', function ($codigo) {
    $vehiculo = \App\Vehiculo::find($codigo);
    $id_tipo_vehiculo = $vehiculo['id_tipo_vehiculo'];
    return \App\Servicio::where('id_tipo_vehiculo', $id_tipo_vehiculo)->get();
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/orden_trabajo/formulario', 'OrdenTrabajoControlador@formulario');
    Route::post('/orden_trabajo/registro', 'OrdenTrabajoControlador@registro');

    Route::get('/servicio/formulario', 'ServicioControlador@formulario');
    Route::post('/servicio/registro', 'ServicioControlador@registro');

    Route::get('/vehiculo/formulario', 'VehiculoControlador@index');
    Route::post('/vehiculo/registro', 'VehiculoControlador@registrarNuevoVehiculo');

    Route::get('/tipo_vehiculo', 'TipoVehiculoControlador@index');
    Route::get('/tipo_vehiculo/agregar', 'TipoVehiculoControlador@agregar');
    Route::post('/tipo_vehiculo/agregar', 'TipoVehiculoControlador@agregar');

    Route::get('/cliente', 'ClienteControlador@index');
    Route::get('/cliente/agregar', 'ClienteControlador@agregar');
    Route::get('/cliente/clientes', 'ClienteControlador@listar');
    Route::post('/cliente/agregar', 'ClienteControlador@agregar');
    Route::post('/cliente/visualizar', 'ClienteControlador@visualizar');
});
