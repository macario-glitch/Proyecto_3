<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::select('id', 'nombre', 'precio', 'created_at', 'updated_at')->orderBy('nombre', 'asc')->get();
        return view("productos.productos_index", compact('productos'));
    }

    public function create()
    {
        return view("productos.productos_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:5|max:500',
        ]);

        Producto::create($request->all());

        return redirect()->route("productos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id) //Index Producto
    {
        $pro = Producto::find($id);
        return view('productos.productos_show', compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($producto_id)
    {
        $producto = Producto::find($producto_id);
        return view("productos.productos_edit", compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:5|max:500',
        ]);

        $producto = Producto::find($producto);
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->save();

        return redirect()->route("productos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($producto_id)
    {
        $producto = Producto::find($producto_id);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
