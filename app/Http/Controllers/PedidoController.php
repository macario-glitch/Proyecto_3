<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::select('id', 'id_usuario', 'total', 'created_at', 'updated_at')->with('user')->orderBy('updated_at', 'asc')->orderBy('id_usuario', 'asc')->get();
        return view("pedidos.pedidos_index", compact('pedidos'));
    }


    public function show($usuario_id) //Index User
    {
        $usuario = User::find($usuario_id);
        $pedidos_info = $usuario->pedidos;
        $nombre = $usuario->name;
        return view('pedidos.pedidos_show', compact('pedidos_info', 'nombre'));
    }

    public function destroy($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }
}
