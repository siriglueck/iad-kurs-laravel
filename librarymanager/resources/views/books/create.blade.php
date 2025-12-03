@extends('layouts.app')

@section('title', 'Buch anlegen')

@section('content')

    <h2>Buch anlegen</h2>

    @if ($errors->any())
        <div class="form-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! __($error) !!}</li>
                @endforeach
            </ul>
        </div>
    @endif

     <form action="" method="post" novalidate>
        @csrf
        <div class="form-row cols-2">
            <div class="form-group">
                <label for="title">Titel:</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" >
                @error('title')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" value="{{ old('author') }}" >
                @error('author')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
        </div>

        <div class="form-row email-age-mat">
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="number" name="isbn" id="isbn" value="{{ old('isbn') }}">
                @error('isbn')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="published_year">Erscheinungsjahr:</label>
                <input type="number" name="published_year" id="published_year" value="{{ old('published_year') }}">
                @error('published_year')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Kategorie:</label>
                <select id="category" name="category">
                    <option value="fiction">Belletristik</option>
                    <option value="non-fiction">Sachbuch</option>
                    <option value="kids-teen">Kinder- und Jugendbücher</option>
                    <option value="guide">Ratgeber</option>
                    <option value="biography">Biografien</option>
                </select>    
                @error('category')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
        </div>
        
        <button type="submit">Speichen</button>
    </form>
    <a class="btn btn-primary" href="">Zurückkehren</a>
    <a class="btn btn-secondary" href="{{ route('books.index')}}">Zurückkehren</a>

@endsection