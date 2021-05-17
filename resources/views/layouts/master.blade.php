<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Management</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="/css/sticky-footer.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">STUDENT MANAGEMENT</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.view') }}">List Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student.create') }}">Add Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('marks.create') }}">Add Student Marks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('marks.list') }}">List Marks</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted"></span>
    </div>
</footer>

<script src="{{ asset('js/slim.min.js') }}"></script>
<script src="/js/tether.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>