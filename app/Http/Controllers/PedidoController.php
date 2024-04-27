<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::select('id', 'id_cliente', 'total', 'created_at', 'updated_at')->with('cliente')->orderBy('created_at', 'asc')->orderBy('id_cliente', 'asc')->get();
        return view("pedidos.pedidos_index", compact('pedidos'));
    }


    public function show($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        $pedidos_info = $cliente->pedidos;
        $nombre = $cliente->nombre;
        return view('pedidos.pedidos_show', compact('pedidos_info', 'nombre'));
    }
}
