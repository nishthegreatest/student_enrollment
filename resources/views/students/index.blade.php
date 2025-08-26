@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Students</h2>
  <a href="{{ route('students.create') }}" class="btn btn-primary">+ Add Student</a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DOB</th>
            <th style="width:160px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($students as $s)
            <tr>
              <td>{{ $s->id }}</td>
              <td>{{ $s->full_name }}</td>
              <td>{{ $s->email }}</td>
              <td>{{ $s->phone }}</td>
              <td>{{ $s->dob }}</td>
              <td>
                <a href="{{ route('students.edit', $s) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('students.destroy', $s) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this student?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-center py-3">No students found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="mt-3">
  {{ $students->links() }}
</div>
@endsection
