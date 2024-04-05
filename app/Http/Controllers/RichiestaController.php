<?php

namespace App\Http\Controllers;
use App\Models\Richiesta;
use Illuminate\Http\Request;

class RichiestaController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|min:3',
            'cognome' => 'required|string|min:3',
            'data_di_nascita' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (strtotime($value) > time()) {
                        $fail('La data di nascita non può essere nel futuro.');
                    }
                },
            ],
            'provincia' => 'required|string',
            'nome_comune' => 'required|string', 
            'richiesta' => 'required|string',
        ]);    
    
        $nuova_richiesta = new Richiesta();
        $nuova_richiesta->fill($validatedData);
        $nuova_richiesta->save();
    
        return view('grazie');
    }
    

    public function index()
    {
        $richieste = Richiesta::all();

        return view('admin.index', compact('richieste'));
    }

    public function show(Richiesta $id)
    {
        $richiesta = Richiesta::find($id);
        return view('admin.show', compact('richiesta'));
    }

}

