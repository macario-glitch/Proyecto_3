<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cliente = Cliente::inRandomOrder()->first();

        return [
            'total' => $this->faker->randomFloat(2),
            'id_cliente' => $cliente->id,
            /*'id_cliente' => function()
            {
                return Cliente::factory()->create()->id;
            }*/

        ];
    }
}
