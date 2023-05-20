<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionCliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_cliente',
        'correo_cliente',
        'asunto',
        'mensaje',
        'users_id'
    ];
    public $timestamps = false;
    protected $table = "atencion_cliente";
}
