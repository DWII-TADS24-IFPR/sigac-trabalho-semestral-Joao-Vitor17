<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@exemplo.com'], 
            [
                'name' => 'Administrador',
                'email' => 'admin@exemplo.com',
                'password' => Hash::make('senha123'),
            ] 
        );
    }
}
