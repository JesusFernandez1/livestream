<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEmpleados extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'grupo_empleados_id'
    ];
    public $timestamps = false;
    protected $table = "grupo_empleados";
}
