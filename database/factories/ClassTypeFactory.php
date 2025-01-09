<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassType>
 */
class ClassTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Boxing', 'Cycling', 'Jiu Jitsu', 'Karate', 'Pilates', 'Yoga'
            ]),
            'description' => fake()->paragraph(),
            'minutes' => fake()->numberBetween(1,5),
        ];
    }
}
