<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;

class EnrollmentSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $courses  = Course::all();

        if ($students->isEmpty() || $courses->isEmpty()) {
            return;
        }

        foreach ($students as $student) {
            $take = rand(1, min(4, $courses->count()));
            foreach ($courses->random($take) as $course) {
                Enrollment::firstOrCreate([
                    'student_id' => $student->id,
                    'course_id'  => $course->id,
                ], [
                    'enrolled_at' => now()->subDays(rand(0, 365)),
                    'grade'       => collect(['A','A-','B+','B','C+','C', null])->random(),
                ]);
            }
        }
    }
}