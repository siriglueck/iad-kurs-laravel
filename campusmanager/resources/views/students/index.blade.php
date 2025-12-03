@extends('layouts.app')

@section('title', 'Studentenliste')

@section('content')

    <h2>Studentenliste</h2>

    <p><a href="{{ route('students.create') }}">Neuen Studenten anlegen </a></p>

    @if($students->isEmpty()) 
        <p>Es sind noch keine Studenten vorhanden.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Email</th>
                    <th>Alter</th>
                    <th>Martrikelnummer</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->firstname }}</td>
                        <td>{{ $s->lastname }}</td>
                        <td>{{ $s->email }}</td>
                        <td>{{ $s->age }}</td>
                        <td>{{ $s->matriculation_number }}</td>
                        <td>
                            <a class="btn btn-secondary" href="/students/{{ $s->id }}">Anzeigen</a>
                            <a class="btn btn-secondary" href="/students/{{ $s->id }}/edit">Bearbeiten</a>
                            <form action="/students/{{ $s->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="student" value="{{ $s->id }}">
                                <button type="submit">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection