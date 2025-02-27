@extends('index')

<style>
    .h2 {
        margin-top: 50px;
        margin-left: 40px;
    }

    .table {
        max-width: 1200px;
        /* Define uma largura máxima para o formulário */
        padding: 20px;
        margin-top: 20px;
        border-radius: 100px;
        white-space: normal;
        word-wrap: break-word;

    }


    .button-group form {
        margin: 0;
        /* Reset default margin */
        padding: 0;
        /* Reset any padding */
        display: inline-block;
        /* Makes form fit just around the button */
    }

    .renovar-btn {
        padding: 5px 10px;
        /* Adjust if needed */
        height: auto;
        /* So it's the same height as other buttons */
        line-height: 1;
        /* Align vertically if needed */
    }


    @media (max-width: 1200px) {
        .table-responsive {
            overflow-x: auto;
            /* Ensures horizontal scrolling */
            display: block;
            /* Prevents table from disappearing */
            white-space: normal;
            /* Prevents text from breaking */
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            /* Stack buttons vertically */
            gap: 5px;
        }

        #botao-confirma {
            position: fixed;
            /* Stays at the bottom even when scrolling */
            bottom: 0;
            left: 0;
            width: 100%;
            /* Full width */
            padding: 10px;
            text-align: center;
            z-index: 1000;
            /* Ensures it's above other content */
        }

        body {
            padding-bottom: 60px;
            /* Prevents content from being hidden behind the fixed button */
        }
    }

    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
            /* Ensures horizontal scrolling */
            display: block;
            /* Prevents table from disappearing */
            white-space: normal;
            /* Prevents text from breaking */
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            /* Stack buttons vertically */
            gap: 5px;
        }

        #botao-confirma {
            position: fixed;
            /* Stays at the bottom even when scrolling */
            bottom: 0;
            left: 0;
            width: 100%;
            /* Full width */
            padding: 10px;
            text-align: center;
            z-index: 1000;
            /* Ensures it's above other content */
        }
    }



    @media (max-width: 480px) {
        .table-responsive {
            overflow-x: auto;
            /* Ensures horizontal scrolling */
            display: block;
            /* Prevents table from disappearing */
            white-space: normal;
            /* Prevents text from breaking */
            word-wrap: break-word;
            overflow-wrap: break-word;
        }


        .button-group {
            display: flex;
            flex-direction: column;
            /* Stack buttons vertically */
            gap: 5px;
        }

        #botao-confirma {
            position: fixed;
            /* Stays at the bottom even when scrolling */
            bottom: 0;
            left: 0;
            width: 100%;
            /* Full width */
            padding: 10px;
            text-align: center;
            z-index: 1000;
            /* Ensures it's above other content */
        }

        body {
            padding-bottom: 60px;
            /* Prevents content from being hidden behind the fixed button */
        }
    }
</style>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Registros</h1>

    <nav class="navbar sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('logout.index') }}">Logout</a>
        </div>
    </nav>
</div>



<form action="{{ route('registro.index') }}" method="get">
    <a id="botao-confirma" type="button" href=" {{ route('cadastrar.registro') }} " class="btn btn-success float-end">
        Incluir Registro
    </a>
</form>

<div class="d-flex justify-content-center">
    <div class="table-responsive ">
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
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
                        <th scope="row"> {{ $registro->id }} </th>
                        <td> {{ $registro->nome }} </td>
                        <td> {{ $registro->dns }} </td>
                        <td> {{ $registro->ip }} </td>
                        <td> {{ $registro->data_registro }} </td>
                        <td>
                            <div class="button-group">
                                <a href="{{ route('atualizar.registro', $registro->id) }}"
                                    class="btn btn-light btn-sm ">
                                    Editar
                                </a>
                                <meta name='csrf-token' content=" {{ csrf_token() }}" />
                                <a onclick="deleteRegistroPaginacao(' {{ route('registro.delete') }} ', {{ $registro->id }})"
                                    class="btn btn-danger btn-sm ">
                                    Excluir
                                </a>

                                <form action="{{ route('renovar.registro', $registro->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button id="renova-botao" type="submit" class="btn btn-primary btn-sm renovar-btn">
                                        Renovar Data
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
