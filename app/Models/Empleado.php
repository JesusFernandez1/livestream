<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'DNI',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'role',
    ];
    public $timestamps = false;
    protected $table = "empleados";
}
