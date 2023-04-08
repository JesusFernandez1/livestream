<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaProducto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'cantidad',
        'productos_id',
        'marcas_id',
    ];
    public $timestamps = false;
    protected $table = "lista_productos";
}
