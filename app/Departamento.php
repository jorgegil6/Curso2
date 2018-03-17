<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamentos';
    protected $fillable=['codigo','descripcion'];

    public function empleados(){
    	return $this->hasMany('\App\Empleado','id_departamento','id');
    }
    //
}
