@extends('layouts.app')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <h2>{{ $course->title }} - Enrolled Students</h2>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center py-3">No students enrolled.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
