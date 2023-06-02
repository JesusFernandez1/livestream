<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'DNI',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'role',
        'grupo_empleados_id'
    ];
    public $timestamps = false;
    protected $table = "empleados";
}
