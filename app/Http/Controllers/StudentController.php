<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:120',
            'last_name'  => 'required|string|max:120',
            'email'      => 'required|email|unique:students,email',
            'phone'      => 'nullable|string|max:30',
            'dob'        => 'nullable|date',
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student created.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:120',
            'last_name'  => 'required|string|max:120',
            'email'      => 'required|email|unique:students,email,' . $student->id,
            'phone'      => 'nullable|string|max:30',
            'dob'        => 'nullable|date',
        ]);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted.');
    }

    // Show courses of a student
    public function courses(Student $student)
    {
        $student->load('courses'); // Eager load courses
        $courses = $student->courses;

        return view('students.courses', compact('student', 'courses'));
    }
}