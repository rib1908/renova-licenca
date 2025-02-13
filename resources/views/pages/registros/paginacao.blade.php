@extends('index')

<style>
.h2 {
    margin-top: 50px;
    margin-left: 40px;
}

#botao-confirma {
    margin-right: 350px;
}

.table {
  max-width: 1000px; /* Define uma largura máxima para o formulário */
  padding: 200px;
  margin-top: 20px;
  border-radius: 100px;
}
</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
    <h1 class="h2">Registros</h1>
</div>
<form action="{{ route('registro.index') }}" method="get">
    <a id="botao-confirma" type="button" href=" {{ route('cadastrar.registro') }} " class="btn btn-success float-end">
        Incluir Registro
    </a>
</form>

<div class="table-responsive mt-4">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>DNS</th>
            <th>IP</th>
            <th>Data Registro</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($findRegistro as $registro)
            <tr>
                <th scope="row"> {{$registro->id}} </th>
                <td> {{$registro->nome}} </td>
                <td> {{$registro->dns}} </td>
                <td> {{$registro->ip}} </td>
                <td> {{$registro->data_registro}} </td>
                <td>
                    <a href="" class="btn btn-light btn-sm">
                      Editar
                    </a>
                    <meta name='csrf-token' content=" {{ csrf_token() }}" />
                    <a onclick="deleteRegistroPaginacao(' {{ route('registro.delete') }} ', {{ $registro->id }})" class="btn btn-danger btn-sm">
                        Excluir
                      </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
