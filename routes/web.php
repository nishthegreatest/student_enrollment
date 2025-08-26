<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', fn () => redirect()->route('students.index'));

Route::resources([
    'students'    => StudentController::class,
    'courses'     => CourseController::class,
    'enrollments' => EnrollmentController::class,
]);