<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre", "precio",
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido__producto', 'id_producto', 'id_pedido');
    }
}
