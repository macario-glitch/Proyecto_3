<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pedido;


class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::select('id', 'nombre', 'correo', 'contraseña', 'created_at', 'updated_at')->orderBy('created_at', 'asc')->get();
        return view("cliente.cliente_index", compact('clientes'));
    }

    public function destroy($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado exitosamente.');
    }

    public function edit($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);
        return view("cliente.cliente_edit", compact('cliente'));
    }

    public function update(Request $request, $cliente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[a-zA-Z\s]*$/',
            'correo' => 'required|string|email|max:255',
        ]);

        $cliente = Cliente::find($cliente);
        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->save();

        return redirect()->route("cliente.index");
    }
}
