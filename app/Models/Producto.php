<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'stock',
        'descripcion',
        'precio',
    ];
    public $timestamps = false;
    protected $table = "productos";
}
