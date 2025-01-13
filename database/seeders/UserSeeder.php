<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed some fixed Users
        User::factory()->create([
            'name' => 'Gene',
            'email' => 'gene@gymbook.com',
            'role' => 'instructor',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gymbook.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Joe',
            'email' => 'joe@gymbook.com',
            'role' => 'instructor',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Simone',
            'email' => 'simone@gymbook.com',
            'role' => 'member',
            'password' => bcrypt('password'),
        ]);

        // Seed random Member accounts (default UserFactory definition)
        User::factory()->count(10)->create();

        // Seed random Instructor accounts
        User::factory()->count(3)->create([
            'role' => 'instructor',
        ]);
    }
}
