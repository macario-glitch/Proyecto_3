<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Pedido_Producto;
use Database\Seeders\PedidoSeeder;
use Database\Seeders\ProductoSeeder;


class Pedido_ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pedido_Producto::factory(20)->create();

    }
}
