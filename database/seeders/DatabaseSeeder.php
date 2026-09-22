<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Cria o usuário de acesso ao sistema.
     *
     * O sistema não tem tela de cadastro público: o acesso é criado por aqui.
     * As credenciais abaixo são apenas para uso local. ANTES DE PUBLICAR O
     * SISTEMA NA NUVEM, defina OWNER_EMAIL e OWNER_PASSWORD nas variáveis de
     * ambiente do servidor para não subir com a senha padrão.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => env('OWNER_EMAIL', 'proprietaria@restaurante.test')],
            [
                'name' => env('OWNER_NAME', 'Proprietária'),
                'password' => Hash::make(env('OWNER_PASSWORD', 'senha1234')),
                'email_verified_at' => now(),
            ]
        );
    }
}
