<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoProductoController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\MenuController;
#use App\Mail\QuejasMailable;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function() {
    return view('inicio');
})->name("inicio")->middleware('verified');


#CRUD users
Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('verified')->middleware('auth');
Route::delete('/user/{id}', [UserController::class, 'destroy']) -> name('user.destroy')->middleware('verified')->middleware('auth');
Route::patch('/user/{id}/edit', [UserController::class, 'update']) -> name('user.update')->middleware('verified')->middleware('auth');
Route::get('/user/{id}/edit', [UserController::class, 'edit']) -> name('user.edit')->middleware('verified')->middleware('auth');

#CRUD pedidos
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index')->middleware('verified')->middleware('auth');
Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show')->middleware('verified')->middleware('auth');
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy')->middleware('verified')->middleware('auth');

#CRUD productos [COMPLETO]
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index')->middleware('verified')->middleware('auth');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create')->middleware('verified')->middleware('auth');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store')->middleware('verified')->middleware('auth');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show')->middleware('verified')->middleware('auth');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy')->middleware('verified')->middleware('auth');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit')->middleware('verified')->middleware('auth');
Route::patch('/productos/{id}/edit', [ProductoController::class, 'update'])->name('productos.update')->middleware('verified')->middleware('auth');

#Vista entre pedidos y productos
Route::get('/pedidos_productos/{id}', [PedidoProductoController::class, 'show'])->name('pedidos_productos.show')->middleware('verified')->middleware('auth');

#Correos Personalizados
Route::get('/quejas', [CorreoController::class, 'index'])->name('quejas.index')->middleware('verified')->middleware('auth');
Route::post('/quejas', [CorreoController::class, 'store'])->name('quejas.store')->middleware('verified')->middleware('auth');

#Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::POST('/menu/guardar', [MenuController::class, 'guardar'])->name('menu.guardar')->middleware('verified')->middleware('auth');
Route::get('/menu/carrito', [MenuController::class, 'show'])->name('menu.show')->middleware('verified')->middleware('auth');
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy')->middleware('verified')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
