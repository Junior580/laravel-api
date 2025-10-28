<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@email.com',
            'password' => 'admin123',
        ]);

        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@email.com',
            'password' => 'admin456',
        ]);
    }
}
