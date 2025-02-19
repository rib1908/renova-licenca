<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $findRegistro = Registro::all();
        return view('pages.vitrine.vitrine', compact('findRegistro'));

    }

    public function adicionarDias($id)
    {
        $dataRegistro = Registro::find($id);

        $dataRegistro = Carbon::parse($dataRegistro-> data_registro);
        $dataRegistro->addDays(90);
        $dataRegistro->save();
        return view('pages.vitrine.vitrine', compact('$dataRegistro'));
    }

}
