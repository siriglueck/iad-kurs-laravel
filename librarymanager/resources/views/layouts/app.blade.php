<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Librarymanager')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="page">
        <header class="page-header">
            <h1 class="page-title">Librarymanager</h1>
            <p class="page-subtitle">Laravel-Grundlagenkurs</p>
            <nav class="page-nav">
                <a href="{{ route('books') }}">Startseite</a>
                <a href="{{ route('books.index') }}">Bücherliste</a>
                <a href="{{ route('library.welcome') }}">Welcome</a>
                <a href="{{ route('library.team') }}">Team</a>
                <a href="{{ route('library.contact') }}">Contact</a>
            </nav>
            <hr>
        </header>
        <main>
            <div class="card">@yield('content')</div>
        </main>
        <footer class="page-footer">
            <hr>
            <small>@ {{date('Y')}} Librarymanager</small>
        </footer>
    </div>
</body>
</html>