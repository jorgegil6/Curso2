<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
 protected $table='cat_turnos' ;
 protected $fillable=['descripcion'];
 public function empleados()
 {
 	return $this->hasMany('App\Empleado','id_turno','id');

 }
    public function setDescriptionAttribute($value);
}
