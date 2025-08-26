@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-primary">Edit Enrollment</h2>
    <p class="text-muted">Update the enrollment details below</p>
</div>

<form method="POST" action="{{ route('enrollments.update', $enrollment) }}" class="card shadow-sm border-0 p-4">
    @csrf
    @method('PUT')

    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label fw-semibold">Student</label>
            <select name="student_id" class="form-select form-select-lg shadow-sm" required>
                @foreach($students as $s)
                    <option value="{{ $s->id }}" @selected(old('student_id', $enrollment->student_id) == $s->id)>
                        {{ $s->full_name }} ({{ $s->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label fw-semibold">Course</label>
            <select name="course_id" class="form-select form-select-lg shadow-sm" required>
                @foreach($courses as $c)
                    <option value="{{ $c->id }}" @selected(old('course_id', $enrollment->course_id) == $c->id)>
                        {{ $c->code }} — {{ $c->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-semibold">Enrolled At</label>
            <input type="date" name="enrolled_at" class="form-control form-control-lg shadow-sm" 
                   value="{{ old('enrolled_at', optional($enrollment->enrolled_at)->format('Y-m-d')) }}" required>
        </div>

        <div class="col-md-2">
            <label class="form-label fw-semibold">Grade</label>
            <input type="text" name="grade" class="form-control form-control-lg shadow-sm" 
                   value="{{ old('grade', $enrollment->grade) }}" placeholder="e.g., A, B+">
        </div>
    </div>

    <div class="mt-4 d-flex flex-wrap gap-2">
        <a href="{{ route('enrollments.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-x-circle me-1"></i> Cancel
        </a>
        <button type="submit" class="btn btn-primary shadow-sm">
            <i class="bi bi-check-circle me-1"></i> Update
        </button>
    </div>

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
