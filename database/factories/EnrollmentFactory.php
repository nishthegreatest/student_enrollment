<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Course;

class EnrollmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id'  => Student::factory(),
            'course_id'   => Course::factory(),
            'enrolled_at' => $this->faker->date(),
            'grade'       => $this->faker->optional()->randomElement(['A','A-','B+','B','C+','C']),
        ];
    }
}