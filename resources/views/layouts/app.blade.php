<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Bootstrap 5 CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>There were some problems with your input:</strong>
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
