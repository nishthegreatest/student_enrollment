<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => ucfirst($this->faker->words(3, true)),
            'code'        => strtoupper($this->faker->unique()->bothify('CS###')),
            'description' => $this->faker->optional()->paragraph(),
            'credits'     => $this->faker->randomElement([2,3,4]),
        ];
    }
}