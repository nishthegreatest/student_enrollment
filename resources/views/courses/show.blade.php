@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div class="text-truncate" style="max-width: 70%;">
        <h1 class="fw-bold display-6 text-primary mb-0">{{ $course->title }}</h1>
        <p class="text-muted mb-0 fst-italic">{{ $course->description ?? 'No description available.' }}</p>
    </div>
    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary shadow-sm align-self-start align-self-md-center">
        <i class="bi bi-arrow-left-circle me-1"></i> Back to Courses
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted" style="width: 50px;">#</th>
                        <th class="fw-semibold">Student Name</th>
                        <th class="fw-semibold">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td class="text-muted">{{ $student->id }}</td>
                            <td class="fw-bold text-primary">{{ $student->full_name ?? $student->name ?? 'N/A' }}</td>
                            <td class="text-secondary">{{ $student->email ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted fst-italic">
                                No students enrolled.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Optional: SweetAlert for success messages --}}
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
