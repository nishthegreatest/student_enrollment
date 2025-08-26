@extends('layouts.app')

@section('content')
<h2>Add Student</h2>
<form method="POST" action="{{ route('students.store') }}" class="card p-3">
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">First Name</label>
      <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Last Name</label>
      <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Date of Birth</label>
      <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
    </div>
  </div>
  <div class="mt-3">
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    <button class="btn btn-success">Save</button>
  </div>
</form>
@endsection
