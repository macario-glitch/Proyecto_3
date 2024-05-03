<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
//use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{

    public function index()
    {
        $this->authorize('isAdmin');
        $productos = Producto::select('id', 'nombre', 'precio', 'descripcion', 'photo_path', 'created_at', 'updated_at')->orderBy('id', 'asc')->get();
        return view("productos.productos_index", compact('productos'));
    }

    public function create()
    {
        $this->authorize('isAdmin');
        return view("productos.productos_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $request->validate([
            'nombre' => 'required|string|min:5|max:255',
            'precio' => 'required|numeric|between:5.00,500.00',
            'descripcion' => 'required|string|min:5|max:255',
            'photo_path' => 'required|image'
        ]);

        if ($request->hasFile('photo_path')) {
            $name = time() . '.' . $request->file('photo_path')->getClientOriginalExtension();
            $img = $request->file('photo_path')->storeAs('public/img', $name);
            $imagePath = '/img/' . $name;
        }

        $producto = new Producto([
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
            'photo_path' => $imagePath ?? null,
        ]);

        $producto->save();

        session()->flash('success');
        return redirect()->route("productos.index")->with('success', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) //Index Producto
    {
        $this->authorize('isAdmin');
        $pro = Producto::find($id);
        return view('productos.productos_show', compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($producto_id)
    {
        $this->authorize('isAdmin');
        $producto = Producto::find($producto_id);
        return view("productos.productos_edit", compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $producto_id)
    {
        $this->authorize('isAdmin');

        $producto = Producto::find($producto_id);

        $request->validate([
            'nombre' => 'required|string|min:5|max:255',
            'precio' => 'required|numeric|between:5,500',
            'descripcion' => 'required|string|min:5|max:255',
            'photo_path' => 'nullable|image'
        ]);

        if ($request->hasFile('photo_path')) {
            // Elimina la imagen anterior si existe
            Storage::disk('public')->delete($producto->photo_path);
            $name = time() . '.' . $request->file('photo_path')->getClientOriginalExtension();
            $img = $request->file('photo_path')->storeAs('public/img', $name);
            $imagePath = '/img/' . $name;
            $producto->photo_path = $imagePath;
        }

        $producto->update([
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
        ]);

        session()->flash('success');
        return redirect()->route("productos.index")->with('success', 'Producto actualizado exitosamente');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($producto_id)
    {
        $this->authorize('isAdmin');
        $producto = Producto::find($producto_id);
        $producto->delete();

        session()->flash('success');
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente');
    }
}
