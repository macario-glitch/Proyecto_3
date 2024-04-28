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
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'pedido_producto', 'id_pedido', 'id_producto');
    }
}
