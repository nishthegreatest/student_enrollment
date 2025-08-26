@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Courses</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Add Course
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted" style="width: 50px;">#</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th style="width: 80px;">Credits</th>
                        <th style="width: 260px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $c)
                        <tr>
                            <td class="text-muted">{{ $c->id }}</td>
                            <td>{{ $c->code }}</td>
                            <td class="fw-semibold text-truncate" style="max-width: 250px;">{{ $c->title }}</td>
                            <td class="text-center">{{ $c->credits }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $c) }}" class="btn btn-sm btn-warning rounded shadow-sm mb-1">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>

                                <a href="{{ route('courses.show', $c) }}" class="btn btn-sm btn-info rounded shadow-sm mb-1">
                                    <i class="bi bi-people me-1"></i> Students
                                </a>

                                <form action="{{ route('courses.destroy', $c) }}" method="POST" class="d-inline delete-form">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded shadow-sm mb-1">
                                        <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted fst-italic">No courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
@if($courses->hasPages())
<div class="mt-3 d-flex justify-content-end">
    {{ $courses->links('pagination::bootstrap-5') }}
</div>
@endif

<!-- SweetAlert for delete -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.delete-form');
    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the course permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
});
</script>
@endsection
