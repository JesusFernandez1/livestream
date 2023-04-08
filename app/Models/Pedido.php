<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
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
        'comunidades_id',
        'provincias',
        'clientes_id',
        'users_id'
    ];
    public $timestamps = false;
    protected $table = "pedidos";
}
