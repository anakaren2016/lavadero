<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_vehiculo';
    protected $fillable = ['nombre', 'descripcion'];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'id_tipo_vehiculo');
    }
}
