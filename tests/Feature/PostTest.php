<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase; 

    public function test_creacion_producto(): void
    {
        $admin = User::factory()->create([
            'role' => 'Admin',
        ]);

        $this->actingAs($admin);

        $datosIncorrectos = [
            'nombre' => '',
            'precio' => 'abc',
            'descripcion' => 'De',
            'photo_path' => 'bruh',
        ];

        $response = $this->post(route('productos.store'), $datosIncorrectos);

        // Verificar que se generen errores de validacion
        $response->assertSessionHasErrors(['nombre', 'precio', 'descripcion', 'photo_path']);
    }
}
