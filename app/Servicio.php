<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 21-03-16
 * Time: 12:34 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public $timestamps = false;
    protected $table = 'servicio';
    protected $fillable = [
        'descripcion',
        'tiempo_estimado',
        'precio',
        'id_tipo_vehiculo'
    ];
}