<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente', [ClienteController::class, 'index']) -> name('cliente.index');
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']) -> name('cliente.destroy');
Route::patch('/cliente/{id}/edit', [ClienteController::class, 'update']) -> name('cliente.update');
Route::get('/cliente/{id}/edit', [ClienteController::class, 'edit']) -> name('cliente.edit');

Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
