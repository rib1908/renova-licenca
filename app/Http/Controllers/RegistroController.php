<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function __construct(Registro $registro)
    {
        $this->registro = $registro;
    }
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findRegistro = $this->registro->getRegistrosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.registros.paginacao', compact('findRegistro'));
    }
}
