@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0 p-4">
    <h2 class="fw-bold mb-4">Add Student</h2>

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">First Name</label>
                <input type="text" name="first_name" class="form-control form-control-lg" value="{{ old('first_name') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Last Name</label>
                <input type="text" name="last_name" class="form-control form-control-lg" value="{{ old('last_name') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Phone</label>
                <input type="text" name="phone" class="form-control form-control-lg" value="{{ old('phone') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Date of Birth</label>
                <input type="date" name="dob" class="form-control form-control-lg" value="{{ old('dob') }}">
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-start">
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary me-2 shadow-sm">Cancel</a>
            <button type="submit" class="btn btn-success shadow-sm">Save Student</button>
        </div>
    </form>
</div>

{{-- Optional: SweetAlert success message --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif
@endsection
