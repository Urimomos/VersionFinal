<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gustavo Ortiz Sanchez',
            'email' => 'repara.fixme@gmail.com', // <-- Cambia esto
            'phone_number' => '+522461499217', // Opcional
            'role' => 'admin',
            'password' => Hash::make('F1xM3.@1'), // <-- ¡CAMBIA ESTO!
        ]);
    }
}