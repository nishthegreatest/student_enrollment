@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Courses</h2>
  <a href="{{ route('courses.create') }}" class="btn btn-primary">+ Add Course</a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Code</th>
            <th>Title</th>
            <th>Credits</th>
            <th style="width:240px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($courses as $c)
            <tr>
              <td>{{ $c->id }}</td>
              <td>{{ $c->code }}</td>
              <td>{{ $c->title }}</td>
              <td>{{ $c->credits }}</td>
              <td>
                <a href="{{ route('courses.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>

                <!-- New button to view enrolled students -->
                <a href="{{ route('courses.show', $c) }}" class="btn btn-sm btn-info">View Students</a>

                <form action="{{ route('courses.destroy', $c) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this course?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center py-3">No courses found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  {{ $courses->links() }}
</div>
@endsection
