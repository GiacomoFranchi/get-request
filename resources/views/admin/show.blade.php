@extends('layouts.app')
@section('content')
<h1>Dettaglio Richiesta</h1>
@foreach($richiesta as $richiesta)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <span>Nome & Cognome:</span>
            <h4 class="card-title">{{ $richiesta->nome }} {{ $richiesta->cognome }}</h4>
            <span>Data di Nascita:</span>
            <h6 class="card-subtitle mb-2 ">{{ $richiesta->data_di_nascita }}</h6>
            <span>Provincia di:</span>
            <h5 class="card-subtitle mb-2 ">{{ $richiesta->provincia }}</h5>
            <span>Comune:</span>
            <h5 class="card-subtitle mb-2 ">{{ $richiesta->nome_comune }}</h5> 
            <span>Testo richiesta:</span>
            <p class="card-text">{{ $richiesta->richiesta }}</p>
        </div>
    </div>
    <a class="btn btn-primary" href="{{ route('dashboard')}}">indietro</a>
@endforeach

<style>
    h1{
        text-align: center;
        margin-top: 2rem;
    }
    .card{
        position: absolute;
        top: 20%;
        left: 50%;
        transform: translate(-50%);
        padding: 1rem;
        background-color: blanchedalmond;
    }
    span{
        font-size: 0.7rem;
        font-weight: bold;
    }
    h5{
        color: black!;
        font-size: 1rem;
        font-weight: 400
    }
    a{
        position: absolute;
        bottom: 10%;
        left: 50%;
        transform: translate(-50%)
    }
</style>
@endsection