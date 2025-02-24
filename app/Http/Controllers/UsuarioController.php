<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function index(Request $request)
    {
        //$pesquisar = $request->pesquisar;
        //$findRegistro = $this->registro->getRegistrosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.login.login');
    }
}
