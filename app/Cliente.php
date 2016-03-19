<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $table = 'cliente';
    protected $fillable = ['nombre', 'telefono', 'direccion', 'ci'];
}