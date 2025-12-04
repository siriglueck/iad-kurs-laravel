@extends('layouts.app')

@section('title', 'Student anzeigen')

@section('content')

    <h2>Studenten anzeigen</h2>

    <x-flash />

    @if ($errors->any())
        <div class="form-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! __($error) !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <span><h4>Vorname : </h4>{{ $student->firstname }}</span> 
        <span><h4>Nachname : </h4>{{ $student->lastname }}</span> 
        <span><h4>E-Mail-Adresse: : </h4>{{ $student->email }}</span> 
        <span><h4>Alter : </h4>{{ $student->age }}</span> 
        <span><h4>Martrikelnummer: : </h4>{{ $student->matriculation_number }}</span> 
        <br>
        <br>
        <br>
    </div>   
    
    <a class="btn btn-secondary" href="{{ route('students.index') }}">Zurück</a>

@endsection