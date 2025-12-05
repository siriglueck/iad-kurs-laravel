@extends('layouts.app')

@section('title', 'Startseite')

@section('content')
    <h2>Infos über {{ $student->firstname }} {{ $student->lastname }}</h2>

    <x-flash />

    <div class="form-row cols-2">
        <div>
            <h3>Persönliche Daten</h3>
            <p>
                Matrikelnummer: <strong>{{ $student->matriculation_number }}</strong><br>
                E-Mail-Adresse: <strong>{{ $student->email }}</strong><br>
                Alter: <strong>{{ $student->age }}</strong><br>
                angelegt am: <strong>{{ $student->created_at }}</strong><br>
                geändert am: <strong>{{ $student->updated_at }}</strong><br>
            </p>
        </div>
        <div>
            <h3>Belegte Kurse</h3>
            <p><strong>Hauptkurs:</strong> {{ $student->mainCourse?->name }}</p>
            <p>
                <strong>Alle Kurse:</strong><br>
                {{-- {{ $student->courses->pluck('shortname')->join(', ') }} --}}
                @foreach ($student->courses as $course)
                    <span class="badge">{{ $course->shortname }}</span>
                @endforeach
            </p>
        </div>

    </div>
    <p>
        {{ $student->firstname }} {{ $student->lastname }}:<br>
        <!-- <a class="btn btn-primary" href="/students/{{ $student->id }}/edit">ändern</a> -->
    <form action="/students/{{ $student->id }}" method="post">
        <a class="btn btn-primary" href="{{ route('students.edit', $student) }}">ändern</a>
    <form action="{{ route('students.destroy', $student) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Löschen</button>
    </form>
    </p>

@endsection