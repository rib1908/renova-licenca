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

   /* public function verificarStatusRegistro($dataRegistro)
    {
        // Converte a data de registro para o formato Carbon
        $dataRegistro = Carbon::parse($dataRegistro);

        // Data final: 90 dias após a data de registro
        $dataExpiracao = $dataRegistro->addDays(90);

        // Data atual
        $dataAtual = Carbon::now();

        // Calculando a diferença de dias entre a data de expiração e a data atual
        $diasRestantes = $dataAtual->diffInDays($dataExpiracao, false); // O 'false' faz com que a diferença possa ser negativa, útil para saber se já expirou

        // Definindo os status com base nos dias restantes
        if ($diasRestantes > 60) {
            return 'Ativo'; // Mais de 60 dias até expirar
        } elseif ($diasRestantes <= 60 && $diasRestantes > 30) {
            return 'Perto de Expirar'; // Entre 30 e 60 dias
        } elseif ($diasRestantes <= 30 && $diasRestantes > 0) {
            return 'Muito Perto de Expirar'; // Menos de 30 dias
        } elseif ($diasRestantes <= 0) {
            return 'Expirado'; // Caso já tenha passado de 90 dias
        }

        // Pegando a data de registro de um item específico do banco de dados
$registro = Registro::find($id); // Ou qualquer outro método para pegar o registro
$status = $this->verificarStatusRegistro($registro->data_registro);
echo $status; // Vai imprimir 'Ativo', 'Perto de Expirar', 'Muito Perto de Expirar', ou 'Expirado'

*/
}
