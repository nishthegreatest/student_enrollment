@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Enrollments</h2>
  <a href="{{ route('enrollments.create') }}" class="btn btn-primary">+ Add Enrollment</a>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Student</th>
            <th>Course</th>
            <th>Enrolled At</th>
            <th style="width:160px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($enrollments as $e)
            <tr>
              <td>{{ $e->id }}</td>
              <td>{{ $e->student?->full_name }}</td>
              <td>{{ $e->course?->code }} — {{ $e->course?->title }}</td>
              <td>{{ optional($e->enrolled_at)->format('Y-m-d') }}</td>
              <td>
                <a href="{{ route('enrollments.edit', $e) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('enrollments.destroy', $e) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this enrollment?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4 text-muted fst-italic">No enrollments found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Pagination --}}
@if($enrollments->hasPages())
<div class="d-flex justify-content-end mt-3">
  {{ $enrollments->links('pagination::bootstrap-5') }}
</div>
@endif
@endsection
