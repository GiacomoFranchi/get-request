<?php

namespace App\Http\Controllers;
use App\Models\Provincia;
use App\Models\Comune;
use Illuminate\Http\Request;

class ProvinciasController extends Controller
{
    public function index(Request $request)
    {
        $provinceId = $request->input('provincia_id', null);
        $province = Provincia::all();
        if ($provinceId !== null) {
            $comuni = Comune::where('provincia_id', $provinceId)->get();
        } else {
            $comuni = [];
        }
        return view('welcome', compact('province', 'comuni', 'provinceId'));
    }

    public function getByProvince(Request $request)
    {
        $provinciaId = $request->input('provincia_id');
        $comuni = Comune::where('provincia_id', $provinciaId)->get();
        return response()->json($comuni);
    }
}
