@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <h2 class="fw-bold mb-0">Courses for {{ $student->full_name }}</h2>
    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary shadow-sm">
        <i class="bi bi-arrow-left-circle me-1"></i> Back to Students
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted" style="width: 50px;">#</th>
                        <th class="fw-semibold" style="width: 180px">Course Name</th>
                        <th>Description</th>
                        <th class="text-center" style="width: 80px;">Credits</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr class="align-middle">
                            <td class="text-muted">{{ $loop->iteration }}</td>
                            <td class="fw-bold">{{ $course->title ?? 'N/A' }}</td>
                            <td class="text-secondary">{{ $course->description ?? '-' }}</td>
                            <td class="text-center fw-semibold">{{ $course->credits ?? 0 }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted fst-italic">
                                No courses enrolled.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Optional: SweetAlert for success message --}}
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
