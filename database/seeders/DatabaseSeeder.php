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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gymbook.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
                'name' => 'Gene',
                'email' => 'gene@gymbook.com',
                'role' => 'instructor',
                'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Simone',
            'email' => 'simone@gymbook.com',
            'role' => 'member',
            'password' => bcrypt('password'),
        ]);
    }
}
