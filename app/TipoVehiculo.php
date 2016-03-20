<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_vehiculo';
    protected $fillable = ['nombre', 'descripcion'];
}
