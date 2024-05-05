<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\PedidoProducto;
use App\Models\Pedido;
use App\Models\User;
use Database\Seeders\PedidoProductoSeeder;

class MenuController extends Controller
{
    public function index()
    {
        $productos = Producto::with('pedidos')->get();
        return view("menu.menu_index", compact('productos'));
    }

    public function guardar(Request $request)
    {
        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->id_usuario = auth()->id(); // Asignar el ID del usuario actual.
        if ($request->total == 0)
            return redirect()->route('menu.index')->with('alert', '¡No hay producto que guardar!');
        $pedido->total = $request->total;
        $pedido->save();

        // Obtener los productos seleccionados del formulario
        $productos = $request->input('producto');
        $cantidades = $request->input('cantidad');

        // Iterar sobre los productos y guardarlos en la tabla pedido_productos
        foreach ($productos as $key => $productoId) {
            $pedidoProducto = new PedidoProducto();
            $pedidoProducto->id_pedido = $pedido->id; // Asignar el ID del pedido creado anteriormente
            $pedidoProducto->id_producto = $productoId;
            $pedidoProducto->cantidad = $cantidades[$key];
            $pedidoProducto->subtotal = $cantidades[$key] * Producto::find($productoId)->precio; // Calcular el subtotal multiplicando la cantidad por el precio del producto
            $pedidoProducto->save();
        }

        return redirect()->route('menu.index')->with('success', '¡Pedido guardado con éxito!');
    }

    public function show()
    {
        $cliente_id = auth()->id();
        $pedidos = Pedido::where('id_usuario', $cliente_id)->with('productos')->get();

        $infoPivot = [];
        foreach ($pedidos as $pedido) {
            $productosPivot = [];
            foreach ($pedido->productos as $producto) {
                $productosPivot[$producto->id] = [
                    'cantidad' => $producto->pivot->cantidad,
                    'subtotal' => $producto->pivot->subtotal,
                ];
            }
            $infoPivot[$pedido->id] = $productosPivot;
        }

        if ($pedidos->isNotEmpty()) {
            return view('menu.menu_show', compact('pedidos', 'infoPivot'));
        }

        return redirect()->route('menu.index')->with('alert', 'Sin pedidos! Hagamos algunos!');
    }

    public function destroy($pedido_id)
    {
        $pedido = Pedido::find($pedido_id);
        $pedido->delete();

        session()->flash('success');
        return redirect()->route('menu.show')->with('success', 'Pedido eliminado exitosamente');
    }

}
