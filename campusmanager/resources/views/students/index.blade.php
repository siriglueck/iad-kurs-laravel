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
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->firstname }}</td>
                        <td>{{ $s->lastname }}</td>
                        <td>{{ $s->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection