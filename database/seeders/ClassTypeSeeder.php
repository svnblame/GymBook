<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
