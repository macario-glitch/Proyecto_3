<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'precio' => $this->faker->randomFloat(2, 5.00, 1000.00),
            'descripcion' => $this->faker->text(50),
            'photo_path' => $this->faker->imageUrl(640, 480, 'product'), 
        ];
    }
}
