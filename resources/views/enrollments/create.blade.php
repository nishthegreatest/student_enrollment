@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-primary">Add New Enrollment</h2>
    <p class="text-muted">Assign a student to a course and record enrollment details</p>
</div>

<form method="POST" action="{{ route('enrollments.store') }}" class="card shadow-sm border-0 p-4">
    @csrf

    <div class="row g-3">
        {{-- Student Dropdown sorted by ID --}}
        <div class="col-md-6">
            <label class="form-label fw-semibold">Student</label>
            <select name="student_id" class="form-select form-select-lg shadow-sm" required>
                <option value="">-- Select student --</option>
                @foreach($students->sortBy('id') as $s)
                    <option value="{{ $s->id }}" @selected(old('student_id') == $s->id)>
                        {{ $s->full_name }} ({{ $s->email }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Course Dropdown sorted by ID --}}
        <div class="col-md-6">
            <label class="form-label fw-semibold">Course</label>
            <select name="course_id" class="form-select form-select-lg shadow-sm" required>
                <option value="">-- Select course --</option>
                @foreach($courses->sortBy('id') as $c)
                    <option value="{{ $c->id }}" @selected(old('course_id') == $c->id)>
                        {{ $c->code }} — {{ $c->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Enrollment Date --}}
        <div class="col-md-4">
            <label class="form-label fw-semibold">Enrolled At</label>
            <input type="date" name="enrolled_at" class="form-control form-control-lg shadow-sm" 
                   value="{{ old('enrolled_at', now()->format('Y-m-d')) }}" required>
        </div>

        {{-- Grade --}}
        <div class="col-md-2">
            <label class="form-label fw-semibold">Grade</label>
            <input type="text" name="grade" class="form-control form-control-lg shadow-sm" 
                   value="{{ old('grade') }}" placeholder="e.g., A, B+">
        </div>
    </div>

    {{-- Form Buttons --}}
    <div class="mt-4 d-flex flex-wrap gap-2">
        <a href="{{ route('enrollments.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-x-circle me-1"></i> Cancel
        </a>
        <button type="submit" class="btn btn-success shadow-sm">
            <i class="bi bi-check-circle me-1"></i> Save
        </button>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mt-3 alert alert-danger shadow-sm">
            <strong>Oops! Please fix the following:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@endsection
