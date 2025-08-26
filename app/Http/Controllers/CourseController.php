<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10); // or ->get()
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

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

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

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

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }
    public function show(Course $course)
    {
        // Assuming many-to-many relation: Course has students
        $students = $course->students; 

        return view('courses.show', compact('course', 'students'));
    }

}