<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'number' => '123456789',
            'password' => 'admin123',
            'is_admin' => true,

        ]);
        \App\Models\User::factory()->create([
            'name' => 'hr',
            'email' => 'hr@gmail.com',
            'number' => '987654321',
            'password' => '123456789',
            'is_admin' => true,
        ]);
    }
}
