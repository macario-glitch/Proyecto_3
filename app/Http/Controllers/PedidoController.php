<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\User;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin');
        $pedidos = Pedido::select('id', 'id_usuario', 'total', 'created_at')->with('user')->orderBy('created_at', 'asc')->orderBy('id_usuario', 'asc')->get();
        return view("pedidos.pedidos_index", compact('pedidos'));
    }


    public function show($usuario_id) //Index User
    {
        $this->authorize('isAdmin');
        $usuario = User::with('pedidos')->find($usuario_id);
        $nombre = $usuario->name;
        
        return view('pedidos.pedidos_show', compact('usuario', 'nombre'));
    }

    public function destroy($pedido_id)
    {
        $this->authorize('isAdmin');
        $pedido = Pedido::find($pedido_id);
        $pedido->delete();

        session()->flash('success');
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente');
    }
}
