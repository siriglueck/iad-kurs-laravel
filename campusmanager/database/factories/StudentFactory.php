<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'lastname' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'email' => fake()->unique()->safeEmail(),
            'matriculation_number' => $this->faker->sentence($nbWords = 1, $variableNbWords = true),
        ];
    }
}
