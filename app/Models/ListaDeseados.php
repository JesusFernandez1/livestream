<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDeseados extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_producto',
        'precio_producto',
        'imagen_producto',
        'descripcion_producto',
        'users_id',
        'productos_id'
    ];

    public $timestamps = false;
    protected $table = "lista_deseados";
}
