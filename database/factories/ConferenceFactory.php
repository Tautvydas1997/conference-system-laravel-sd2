<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'lecturers' => fake()->name() . ', ' . fake()->name(),
            'date' => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'time' => fake()->time('H:i'),
            'address' => fake()->address(),
            'status' => fake()->randomElement(['planned', 'completed']),
        ];
    }
}
