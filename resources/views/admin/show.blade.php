@extends('layouts.app')
@section('content')

@foreach($richiesta as $richiesta)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $richiesta->nome }} {{ $richiesta->cognome }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $richiesta->data_di_nascita }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">{{ $richiesta->provincia }}</h6>
            <h3 class="card-subtitle mb-2 text-muted">{{ $richiesta->nome_comune }}</h6> 
            <p class="card-text">{{ $richiesta->richiesta }}</p>
        </div>
    </div>
    <a href="{{ route('dashboard')}}">sda</a>
    <a href="{{ route('richieste.show', ['id' => $richiesta->id]) }}">
@endforeach
@endsection