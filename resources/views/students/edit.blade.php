@extends('layouts.app')

@section('content')
<h2>Edit Student</h2>
<form method="POST" action="{{ route('students.update', $student) }}" class="card p-3">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">First Name</label>
      <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $student->first_name) }}" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Last Name</label>
      <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $student->last_name) }}" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Date of Birth</label>
      <input type="date" name="dob" class="form-control" value="{{ old('dob', $student->dob) }}">
    </div>
  </div>
  <div class="mt-3">
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    <button class="btn btn-primary">Update</button>
  </div>
</form>
@endsection
