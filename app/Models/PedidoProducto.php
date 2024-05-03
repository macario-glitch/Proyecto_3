<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    use HasFactory;

    protected $table = "pedido_productos";

    protected $fillable = [
        "id_pedido","id_producto","cantidad","subtotal",
    ];
}
