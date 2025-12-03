@extends('layouts.app')

@section('title', 'Student bearbeiten')

@section('content')

    <h2>Neuen Studenten bearbeiten</h2>

    @if ($errors->any())
        <div class="form-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! __($error) !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/students/{{ $student->id }}" method="post" novalidate>
        @csrf
        @method('PUT')
        <div class="form-row cols-2">
            <div class="form-group">
                <label for="firstname">Vorname:</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $student->firstname) }}" >
                @error('firstname')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="lastname">Nachname:</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $student->lastname) }}" >
                @error('last')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
        </div>

        <div class="form-row email-age-mat">
            <div class="form-group">
                <label for="email">E-Mail-Adresse:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $student->email) }}" >
                @error('email')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="age">Alter:</label>
                <input type="number" name="age" id="age" value="{{ old('age', $student->age) }}">
                @error('age')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="matriculation_number">Martrikelnummer:</label>
                <input type="text" name="matriculation_number" id="matriculation_number" value="{{ old('matriculation_number', $student->matriculation_number) }}" >
                @error('matriculation_number')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
        </div>
        
        <button type="submit">Speichen</button>
    </form>
@endsection