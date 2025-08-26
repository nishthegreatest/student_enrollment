<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Bootstrap 5 CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- SweetAlert2 CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .container {
      max-width: 1000px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('students.index') }}">SMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbars" class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a href="{{ route('students.index') }}" class="nav-link">Students</a></li>
        <li class="nav-item"><a href="{{ route('courses.index') }}" class="nav-link">Courses</a></li>
        <li class="nav-item"><a href="{{ route('enrollments.index') }}" class="nav-link">Enrollments</a></li>
      </ul>
    </div>
  </div>
</nav>

<main class="container py-4">
  {{-- SweetAlert success --}}
  @if(session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        timer: 2500,
        showConfirmButton: false
      });
    </script>
  @endif

  {{-- SweetAlert errors --}}
  @if ($errors->any())
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: `<ul style="text-align:left;">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`
      });
    </script>
  @endif

  @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
