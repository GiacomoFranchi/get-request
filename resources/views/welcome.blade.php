@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Invia la tua richiesta</h1>

        <form id="form" class="mt-5" action="{{ route('store') }}" method="POST">
            @csrf

            {{-- Input Nome --}}
            <div class="mb-4 has-validation">
                <label for="nome" class="form-label fw-bold">Nome</label>
                <input required minlength="3" type="text" class="form-control " id="nome" name="nome">
            </div>

            {{-- Input Cognome --}}
            <div class="mb-4 has-validation">
                <label for="cognome" class="form-label fw-bold">Cognome</label>
                <input required minlength="3" type="text" class="form-control " id="cognome" name="cognome">
            </div>
            {{-- data di nscita --}}
            <div class="mb-4 has-validation">
                <label for="data_di_nascita" class="form-label fw-bold">Data di nascita</label>
                <input required type="date" class="form-control @error('data_di_nascita') is-invalid @enderror"
                    id="data_di_nascita" name="data_di_nascita" value="{{ old('data_di_nascita') }}">

                @error('data_di_nascita')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Selezione Provincia --}}
            <select name="provincia" id="provincia">
                <option value="">Seleziona una provincia</option>
                @foreach ($province as $prov)
                    <option value="{{ $prov->nome }}">{{ $prov->nome }}</option>
                @endforeach
            </select>

            {{-- Campo Nascosto per il Comune --}}
            <input type="hidden" id="nome_comune_hidden" name="nome_comune" value="">

            {{-- Selezione Comune --}}
            <select name="comuni" id="comuni">
                <option value="">Seleziona prima una provincia</option>
                @foreach ($comuni as $comune)
                    <option value="{{ $comune->nome }}">{{ $comune->nome }}</option>
                @endforeach
            </select>
            {{-- testo --}}
            <div class="mb-4 has-validation">
                <label for="richiesta" class="form-label fw-bold">Richiesta</label>
                <textarea required class="form-control @error('richiesta') is-invalid @enderror" id="richiesta" name="richiesta">{{ old('richiesta') }}</textarea>

                @error('richiesta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- SUBMIT button --}}
            <button id="submitButton" class="btn btn-success" type="submit">Save</button>

        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#provincia').change(function() {
                var provinciaId;
                if ($(this).val() === 'Milano') {
                    provinciaId = 1;
                } else if ($(this).val() === 'Bergamo') {
                    provinciaId = 2;
                } else if ($(this).val() === 'Como') {
                    provinciaId = 3;
                } else {
                    provinciaId = null;
                }

                var nomeComuneSelezionato = $('#comuni').val();

                if (provinciaId !== null) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('comuni.getByProvince') }}",
                        data: {
                            'provincia_id': provinciaId,
                            'nome_comune': nomeComuneSelezionato
                        },
                        success: function(data) {
                            if (data) {
                                $('#comuni').empty();
                                $('#comuni').append(
                                    '<option value="">Seleziona un comune</option>');
                                $.each(data, function(key, value) {
                                    $('#comuni').append('<option value="' + value.nome +
                                        '">' + value.nome + '</option>');
                                });
                            } else {
                                $('#comuni').empty();
                            }
                        }
                    });
                } else {
                    $('#comuni').empty();
                }
            });
            $('#comuni').change(function() {
                var nomeComuneSelezionato = $(this).val();
                $('#nome_comune_hidden').val(
                nomeComuneSelezionato);
                console.log("Comune selezionato: ", nomeComuneSelezionato);
            });
        });
    </script>
@endsection
