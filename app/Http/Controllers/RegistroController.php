<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestRegistro;
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

    public function delete (Request $request)
    {
            $id =$request->id;
            $buscaRegistro = Registro::find($id);
            $buscaRegistro->delete();
            return response()->json(['success' => true]);
    }


    public function cadastrarRegistro(FormRequestRegistro $request)
    {
        if ($request->method() == 'POST') {
            //cria dados
            $data = $request->all();
            Registro::create($data);

            return redirect()->route('registro.index');
        }

        return view('pages.registros.create');
    }
}
