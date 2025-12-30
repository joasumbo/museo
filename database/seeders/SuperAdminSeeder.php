<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@museu-alcanena.pt'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@Museu2025!'),
                'role' => 'superadmin',
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('✅ Superadmin criado com sucesso!');
        $this->command->info('📧 Email: admin@museu-alcanena.pt');
        $this->command->info('🔐 Senha: Admin@Museu2025!');
    }
}
