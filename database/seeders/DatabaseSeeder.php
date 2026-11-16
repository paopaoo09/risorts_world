<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'full_name' => 'Resort Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
        ]);

        User::factory()->employee()->create([
            'full_name' => 'Resort Employee',
            'username' => 'employee',
            'email' => 'employee@example.com',
        ]);

        User::factory()->create([
            'full_name' => 'Resort Customer',
            'username' => 'customer',
            'email' => 'customer@example.com',
        ]);
    }
}
