<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Display a paginated list of courses
    public function index()
    {
        $courses = Course::orderBy('id')->paginate(10)->withQueryString();
        return view('courses.index', compact('courses'));
    }

    // Show the form to create a new course
    public function create()
    {
        return view('courses.create');
    }

    // Store a newly created course
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:200',
            'code'        => 'required|string|max:20|unique:courses,code',
            'description' => 'nullable|string',
            'credits'     => 'required|integer|min:1|max:10',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course created.');
    }

    // Show the form to edit an existing course
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // Update an existing course
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:200',
            'code'        => 'required|string|max:20|unique:courses,code,' . $course->id,
            'description' => 'nullable|string',
            'credits'     => 'required|integer|min:1|max:10',
        ]);

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Course updated.');
    }

    // Delete a course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }

    // Show the students enrolled in a course
    public function show(Course $course)
    {
        $students = $course->students; // assumes a many-to-many relationship
        return view('courses.show', compact('course', 'students'));
    }
}