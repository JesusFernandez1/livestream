<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'pedidos_id',
        'productos_id',
    ];
    public $timestamps = false;
    protected $table = "productos_pedidos";
}
