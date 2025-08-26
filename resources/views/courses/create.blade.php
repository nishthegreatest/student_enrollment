@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold text-primary">Add New Course</h2>
    <p class="text-muted">Fill out the form below to create a new course</p>
</div>

<form method="POST" action="{{ route('courses.store') }}" class="card shadow-sm border-0 p-4">
    @csrf

    <div class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-semibold">Code</label>
            <input type="text" name="code" class="form-control form-control-lg shadow-sm" 
                   value="{{ old('code') }}" required>
        </div>

        <div class="col-md-8">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control form-control-lg shadow-sm" 
                   value="{{ old('title') }}" required>
        </div>

        <div class="col-12">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control form-control-lg shadow-sm" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-semibold">Credits</label>
            <input type="number" name="credits" class="form-control form-control-lg shadow-sm" 
                   value="{{ old('credits',3) }}" min="1" max="10" required>
        </div>
    </div>

    <div class="mt-4 d-flex flex-wrap gap-2">
        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-x-circle me-1"></i> Cancel
        </a>
        <button type="submit" class="btn btn-success shadow-sm">
            <i class="bi bi-check-circle me-1"></i> Save
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
