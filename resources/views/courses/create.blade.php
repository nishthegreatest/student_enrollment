@extends('layouts.app')

@section('content')
<h2>Add Course</h2>
<form method="POST" action="{{ route('courses.store') }}" class="card p-3">
  @csrf
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label">Code</label>
      <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
    </div>
    <div class="col-md-8">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="col-md-12">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    </div>
    <div class="col-md-3">
      <label class="form-label">Credits</label>
      <input type="number" name="credits" class="form-control" value="{{ old('credits',3) }}" min="1" max="10" required>
    </div>
  </div>
  <div class="mt-3">
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
    <button class="btn btn-success">Save</button>
  </div>
</form>
@endsection
