@extends('layouts.app')

@section('content')
<h2>Add Enrollment</h2>
<form method="POST" action="{{ route('enrollments.store') }}" class="card p-3">
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Student</label>
      <select name="student_id" class="form-select" required>
        <option value="">-- Select student --</option>
        @foreach($students as $s)
          <option value="{{ $s->id }}" @selected(old('student_id')==$s->id)>{{ $s->full_name }} ({{ $s->email }})</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Course</label>
      <select name="course_id" class="form-select" required>
        <option value="">-- Select course --</option>
        @foreach($courses as $c)
          <option value="{{ $c->id }}" @selected(old('course_id')==$c->id)>{{ $c->code }} — {{ $c->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label">Enrolled At</label>
      <input type="date" name="enrolled_at" class="form-control" value="{{ old('enrolled_at', now()->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-2">
      <label class="form-label">Grade</label>
      <input type="text" name="grade" class="form-control" value="{{ old('grade') }}" placeholder="e.g., A, B+">
    </div>
  </div>
  <div class="mt-3">
    <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancel</a>
    <button class="btn btn-success">Save</button>
  </div>
</form>
@endsection
