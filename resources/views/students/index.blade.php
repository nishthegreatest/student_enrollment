@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Students</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Add Student
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="text-muted">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Birth</th>
                        <th class="text-center" style="width:200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $s)
                        <tr>
                            <td class="text-muted">{{ $s->id }}</td>
                            <td>{{ $s->full_name }}</td>
                            <td>{{ $s->email }}</td>
                            <td>{{ $s->phone }}</td>
                            <td>{{ \Carbon\Carbon::parse($s->dob)->format('d M, Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('students.edit', $s) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="{{ route('students.courses', $s) }}" class="btn btn-sm btn-info me-1">
                                    <i class="bi bi-journal-bookmark"></i> View
                                </a>
                                <form action="{{ route('students.destroy', $s) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Pagination --}}
@if ($students->hasPages())
<nav class="mt-3">
    <ul class="pagination justify-content-end">
        {{-- Previous Page Link --}}
        @if ($students->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo; Previous</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $students->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
        @endif

        {{-- Page Numbers --}}
        @foreach ($students->links()->elements[0] as $page => $url)
            @if ($page == $students->currentPage())
                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($students->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $students->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>
        @endif
    </ul>
</nav>
@endif

{{-- SweetAlert Delete Confirmation --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
});
</script>
@endsection
