<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function delete(Request $request)
    {
        $id = $request->id;
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
        //mostrar os dados
        return view('pages.registros.create');
    }

    public function atualizarRegistro(FormRequestRegistro $request, $id)
    {
        if ($request->method() == 'PUT') {
            //atualiza dados
            $data = $request->all();

            $buscaRegistro = Registro::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('registro.index');
        }
        $findRegistro = Registro::where('id', '=', $id)->first();
        //mostrar os dados
        return view('pages.registros.atualiza', compact('findRegistro'));
    }

    public function adicionarDias($id)
    {
        $dataRegistro = Registro::find($id);

        if ($dataRegistro) {
            // Converter a data_registro para um objeto Carbon e adicionar 90 dias
            $novaData = Carbon::parse($dataRegistro->data_registro)->addDays(90);

            // Atualizar o campo no modelo
            $dataRegistro->data_registro = $novaData;
            $dataRegistro->save(); // Salvar no banco de dados
        }
        $findRegistro = Registro::all();
        return view('pages.registros.paginacao', compact('findRegistro'));
    }
}
