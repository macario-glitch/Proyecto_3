<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Producto;
use App\Models\PedidoProducto;
use App\Http\Controllers\Controller;


class PedidoProductoController extends Controller
{
    /*public function show($pedido_id)
    {
        $this->authorize('isAdmin');
        $pedido_info = Pedido::find($pedido_id);
        $productos = $pedido_info->productos;
        $pp_info = PedidoProducto::where('id_pedido', $pedido_id)->get();
        return view('pedido_producto.show', compact('productos', 'pp_info'));
    }*/

    public function show($pedido_id)
    {
        $this->authorize('isAdmin');
        $pedido_info = Pedido::with('productos')->find($pedido_id);
        $pp_info = PedidoProducto::where('id_pedido', $pedido_id)->get();
        return view('pedido_producto.show', compact('pedido_info', 'pp_info'));
    }
}
