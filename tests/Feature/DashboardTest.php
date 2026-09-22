<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_visitante_na_raiz_e_levado_para_o_login(): void
    {
        $this->get('/')->assertRedirect('/dashboard');

        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_usuario_autenticado_acessa_o_painel(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
        $response->assertSee($user->name);
    }

    public function test_nao_existe_cadastro_publico(): void
    {
        $this->get('/register')->assertNotFound();
    }
}
