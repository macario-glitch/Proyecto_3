<?php

namespace Tests\Feature;

use App\Models\Pedido;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Pedio;

class BorrarTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test para eliminar un registro.
     */
    public function test_eliminar_registro(): void
    {
        $admin = User::factory()->create([
            'role' => 'Admin',
        ]);

        $this->actingAs($admin);

        $pedidos = Pedido::factory()->create();

        $response = $this->delete(route('pedidos.destroy', $pedidos->id));

        $this->assertDatabaseMissing('pedidos', ['id' => $pedidos->id]);

        $response->assertRedirect(route('pedidos.index'));
    }
}
