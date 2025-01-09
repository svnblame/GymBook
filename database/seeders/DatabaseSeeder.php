<?php

namespace Database\Seeders;

use App\Models\ClassType;
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
        // Seed Users
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

        // Seed ClassTypes
        ClassType::factory()->create([
            'name' => 'Boxing',
            'description' => 'Boxing class',
            'minutes' => 30
        ]);

        ClassType::factory()->create([
            'name' => 'Cycling',
            'description' => 'Cycling class',
            'minutes' => 60
        ]);

        ClassType::factory()->create([
            'name' => 'Jiu Jitsu',
            'description' => 'Jiu Jitsu class',
            'minutes' => 45
        ]);

        ClassType::factory()->create([
            'name' => 'Karate',
            'description' => 'Karate class',
            'minutes' => 45
        ]);

        ClassType::factory()->create([
            'name' => 'Pilates',
            'description' => 'Pilates class',
            'minutes' => 60
        ]);

        ClassType::factory()->create([
            'name' => 'Yoga',
            'description' => 'Yoga class',
            'minutes' => 60
        ]);
    }
}
