<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23-03-16
 * Time: 01:14 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    public $timestamps = false;
    protected $table = 'detalle_orden';
    protected $fillable = [
        'id_orden',
        'id_servicio'
    ];
}