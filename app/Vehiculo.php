<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    public $timestamps = false;
    protected $table = 'vehiculo';
    protected $fillable = [
        'placa',
        'id_cliente',
        'id_tipo_vehiculo'
    ];

    public function tipoVehiculo()
    {
        return $this->belongsTo('App\TipoVehiculo', 'id_tipo_vehiculo');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }

}