<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'DNI',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'direccion',
        'numero_piso',
        'datos_adicionales',
        'observaciones',
        'codigo_postal',
        'fecha_pedido',
        'fecha_entrega',
        'estado',
        'importe_total',
        'updated_at',
        'autor_modificacion',
        'comunidades_id',
        'provincias_cod',
        'users_id'
    ];
    public $timestamps = false;
    protected $table = "pedidos";
}
