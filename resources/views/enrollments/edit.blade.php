@extends('layouts.app')

@section('content')
<h2>Edit Enrollment</h2>
<form method="POST" action="{{ route('enrollments.update', $enrollment) }}" class="card p-3">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Student</label>
      <select name="student_id" class="form-select" required>
        @foreach($students as $s)
          <option value="{{ $s->id }}" @selected(old('student_id',$enrollment->student_id)==$s->id)>{{ $s->full_name }} ({{ $s->email }})</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Course</label>
      <select name="course_id" class="form-select" required>
        @foreach($courses as $c)
          <option value="{{ $c->id }}" @selected(old('course_id',$enrollment->course_id)==$c->id)>{{ $c->code }} — {{ $c->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label">Enrolled At</label>
      <input type="date" name="enrolled_at" class="form-control" value="{{ old('enrolled_at', optional($enrollment->enrolled_at)->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-2">
      <label class="form-label">Grade</label>
      <input type="text" name="grade" class="form-control" value="{{ old('grade',$enrollment->grade) }}" placeholder="e.g., A, B+">
    </div>
  </div>
  <div class="mt-3">
    <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancel</a>
    <button class="btn btn-primary">Update</button>
  </div>
</form>
@endsection
