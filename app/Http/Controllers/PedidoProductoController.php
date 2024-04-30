<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Producto;
use App\Models\PedidoProducto;


class PedidoProductoController extends Controller
{
    public function show($pedido_id)
    {
        $pedido_info = Pedido::find($pedido_id);
        $productos = $pedido_info->productos;
        return view('pedido_producto.show', compact('productos'));
    }
}
