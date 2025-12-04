@if(session('success'))
    <x-alert type="success"> {{ session('success') }} </x-alert>
@endif

@if(session('error'))
    <x-alert type="warning"> {{ session('error') }} </x-alert>
@endif

@if(session('status'))
    <x-alert> {{ session('status') }} </x-alert>
@endif

@if($errors->any())
    <x-alert type="warning"> 
        <strong>Es sind {{ $errors->count() }} Fehler aufgetreten: </strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </x-alert>
@endif