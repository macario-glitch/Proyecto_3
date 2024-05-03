<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\PedidoProducto;
use Database\Seeders\PedidoSeeder;
use Database\Seeders\ProductoSeeder;


class PedidoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PedidoProducto::factory(20)->create();

    }
}
