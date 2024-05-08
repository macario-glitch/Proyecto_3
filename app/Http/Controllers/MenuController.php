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
        // Obtener los productos seleccionados del formulario
        $productos = $request->input('productos');
        //dd($productos);

        // Validar que se hayan seleccionados productos

        $productosSeleccionados = array_filter($productos, function ($producto) {
            return isset($producto['selected']) && $producto['selected'] == 1;
        });

        if (empty($productosSeleccionados)) {
            return redirect()->route('menu.index')->with('alert', '¡No has seleccionado ningún producto!');
        }


        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->id_usuario = auth()->id(); // Asignar el ID del usuario actual.
        $pedido->total = 0; // Inicializar el total en 0
        $pedido->save();

        $total = 0; // Variable para almacenar el total calculado

        // Iterar sobre los productos y guardarlos en la tabla pedido_productos
        foreach ($productos as $productoId => $productoData) {
            if (isset($productoData['selected']) && $productoData['selected'] == 1) {
                $pedidoProducto = new PedidoProducto();
                $pedidoProducto->id_pedido = $pedido->id; // Asignar el ID del pedido creado anteriormente
                $pedidoProducto->id_producto = $productoId;
                $pedidoProducto->cantidad = $productoData['cantidad'];
                $precioProducto = Producto::find($productoId)->precio; // Obtener el precio del producto
                $pedidoProducto->subtotal = $productoData['cantidad'] * $precioProducto; // Calcular el subtotal multiplicando la cantidad por el precio del producto
                $pedidoProducto->save();

                // Sumar el subtotal al total
                $total += $pedidoProducto->subtotal;
            }
        }

        // Actualizar el total en el pedido con el total calculado
        $pedido->total = $total;
        $pedido->save();

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
