<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Cliente;
use Database\seeders\ClienteSeeder; // Importa el seeder de clientes

class PedidoSeeder extends Seeder
{
    public function run()
    {
        Pedido::factory(20)->create();
    }
}

