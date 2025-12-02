<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Campusmanager')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="page">
        <header class="page-header">
            <h1 class="page-title">Campusmanager</h1>
            <p class="page-subtitle">Laravel-Grundlagenkurs</p>
            <nav class="page-nav">
                <a href="{{ route('home') }}">Start</a>
                <a href="{{ route('students.index') }}">Studenten</a>
                <a href="{{ route('about') }}">About</a>
            </nav>
            <hr>
        </header>
        <main>
            <div class="card">@yield('content')</div>
        </main>
        <footer class="page-footer">
            <hr>
            <small>@ {{date('Y')}} Campusmanager</small>
        </footer>
    </div>
</body>
</html>