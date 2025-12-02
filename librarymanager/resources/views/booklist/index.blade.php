@extends('layouts.app')

@section('title', 'Bücherliste')

@section('content')

    <h2>Bücherliste</h2>

    @if($books->isEmpty()) 
        <p>Es sind noch keine Bücher vorhanden.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Erscheinungsjahr</th>
                    <th>Kategorie</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $b)
                    <tr>
                        <td>{{ $b->title }}</td>
                        <td>{{ $b->author }}</td>
                        <td>{{ $b->isbn }}</td>
                        <td>{{ $b->published_year }}</td>
                        <td>{{ $b->category }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection