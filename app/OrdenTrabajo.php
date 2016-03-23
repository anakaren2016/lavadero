<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 23-03-16
 * Time: 01:11 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    public $timestamps = false;
    protected $table = 'orden_trabajo';
    protected $fillable = [
        'placa',
        'total',
        'tiempo'
    ];
}