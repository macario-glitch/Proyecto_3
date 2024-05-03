<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Pedido;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido_Producto>
 */
class PedidoProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pedido = Pedido::inRandomOrder()->first();
        $producto = Producto::inRandomOrder()->first();
        return [
            'id_pedido' => $pedido->id,
            'id_producto' => $producto->id,
            'cantidad' => $this->faker->randomDigit(),
            'subtotal' => $this->faker->randomFloat(2),
        ];
    }
}
