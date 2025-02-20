<?php

namespace App\Http\Controllers;


use App\Models\Registro;
use Illuminate\Http\Request;

class VitrineController extends Controller
{

    public function __construct(Registro $registro)
    {
        $this->registro = $registro;
    }

    public function index(Request $request)
    {
        /*$pesquisar = $request->pesquisar;
        $findRegistro = $this->registro->getRegistrosPesquisarIndex(search: $pesquisar ?? '');
        */
        $findRegistro = Registro::orderBy('data_registro')->get();
        return view('pages.vitrine.vitrine', compact('findRegistro'));
    }

}
