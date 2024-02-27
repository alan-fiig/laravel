<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_login(): void
    {
        // Crear un usuario de prueba en la base de datos
        $user = User::factory()->create([
            'name' => 'Juan Peréz',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Autenticar al usuario utilizando Sanctum
        $this->actingAs($user);

        // Enviar una solicitud POST al endpoint de login con las credenciales del usuario
        $response = $this->post('api/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Verificar que la respuesta tiene el código de estado 201 (éxito)
        $response->assertStatus(201);
    }
}
