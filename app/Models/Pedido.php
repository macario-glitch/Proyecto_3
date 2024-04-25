<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_cliente", "total",
    ];

    //un pedido pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto', 'id_pedido', 'id_producto');
    }
}
