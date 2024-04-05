@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Richieste Ricevute</h2>

    @if (Session::has('message'))
        <div class="alert alert-success w-50 mx-auto">
            {{ Session::get('message') }}
        </div>
    @endif


    @if (count($richieste) > 0)
        <table class="table table-striped mt-5 w-100">
            <thead>
                <tr>
                    <th scope="col" class="title-column fs-5">Id</th>
                    <th scope="col" class="description-column fs-5">Nome</th>
                    <th scope="col" class="action-column fs-5">Cognome</th>
                    <th scope="col" class="action-column fs-5">Info</th>
                </tr>
            </thead>
            <tbody class="w-100">
                @foreach ($richieste as $richiesta)
                    <tr>
                        <td scope="row">
                            <h6>{{ $richiesta->id }}</h6>
                        </td>
                        <td>{{ $richiesta->nome }}</td>
                        <td>{{ $richiesta->cognome }}</td>
                        {{-- show button --}}
                        <td>
                            <a class="info" href="{{ route('richieste.show', ['id' => $richiesta->id]) }}">
                                <i class="fa-solid fa-circle-info"> info</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning w-50 mx-auto">
           <p> Nessuna Richiesta Ottenuta</p>
        </div>
    @endif
</div>
<style>

</style>
@endsection