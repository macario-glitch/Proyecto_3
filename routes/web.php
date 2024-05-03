<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoProductoController;
use App\Http\Controllers\CorreoController;
#use App\Mail\QuejasMailable;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function() {
    return view('inicio');
})->name("inicio");


#CRUD users
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::delete('/user/{id}', [UserController::class, 'destroy']) -> name('user.destroy');
Route::patch('/user/{id}/edit', [UserController::class, 'update']) -> name('user.update');
Route::get('/user/{id}/edit', [UserController::class, 'edit']) -> name('user.edit');

#CRUD pedidos
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

#CRUD productos [COMPLETO]
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index')->middleware('auth');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::patch('/productos/{id}/edit', [ProductoController::class, 'update'])->name('productos.update');

#Vista entre pedidos y productos
Route::get('/pedidos_productos/{id}', [PedidoProductoController::class, 'show'])->name('pedidos_productos.show');

#Correos Personalizados
Route::get('/quejas', [CorreoController::class, 'index'])->name('quejas.index')->middleware('auth');
Route::post('/quejas', [CorreoController::class, 'store'])->name('quejas.store')->middleware('auth');

#Menu


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
