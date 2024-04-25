<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre", "correo", "contraseña",
    ];

    //Un cliente Puede tener muchos pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_cliente');
    }

}
