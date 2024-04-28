<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::select('id', 'nombre', 'precio', 'created_at', 'updated_at')->orderBy('updated_at', 'asc')->orderBy('nombre', 'asc')->get();
        return view("productos.productos_index", compact('productos'));
    }
}
