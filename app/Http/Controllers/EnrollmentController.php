<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student','course'])
            ->latest('enrolled_at')
            ->paginate(10);

        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::orderBy('last_name')->get();
        $courses  = Course::orderBy('code')->get();
        return view('enrollments.create', compact('students','courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id'  => 'required|exists:students,id',
            'course_id'   => 'required|exists:courses,id',
            'enrolled_at' => 'required|date',
            'grade'       => 'nullable|string|max:3',
        ]);

        // avoid duplicate pair
        $exists = Enrollment::where('student_id', $data['student_id'])
            ->where('course_id', $data['course_id'])
            ->exists();

        if ($exists) {
            return back()->withErrors(['course_id' => 'This student is already enrolled in that course.'])->withInput();
        }

        Enrollment::create($data);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created.');
    }

    public function edit(Enrollment $enrollment)
    {
        $students = Student::orderBy('last_name')->get();
        $courses  = Course::orderBy('code')->get();
        return view('enrollments.edit', compact('enrollment','students','courses'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $data = $request->validate([
            'student_id'  => 'required|exists:students,id',
            'course_id'   => 'required|exists:courses,id',
            'enrolled_at' => 'required|date',
            'grade'       => 'nullable|string|max:3',
        ]);

        $exists = Enrollment::where('student_id', $data['student_id'])
            ->where('course_id', $data['course_id'])
            ->where('id', '!=', $enrollment->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['course_id' => 'This student is already enrolled in that course.'])->withInput();
        }

        $enrollment->update($data);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated.');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted.');
    }
}