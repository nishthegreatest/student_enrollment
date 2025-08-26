<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', fn () => redirect()->route('students.index'));

// Resource routes
Route::resources([
    'students'    => StudentController::class,
    'courses'     => CourseController::class,
    'enrollments' => EnrollmentController::class,
]);

// Custom route to view all courses for a specific student
Route::get('students/{student}/courses', [StudentController::class, 'courses'])
     ->name('students.courses');