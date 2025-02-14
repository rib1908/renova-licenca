<?php

use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('vitrine.vitrine');
});

Route::prefix('registros')->group(function() {
    Route::get('/', [RegistroController::class, 'index'])->name('registro.index');
    //cadastro
    Route::get('/cadastrarRegistro', [RegistroController::class, 'cadastrarRegistro'])->name('cadastrar.registro');
    Route::post('/cadastrarRegistro', [RegistroController::class, 'cadastrarRegistro'])->name('cadastrar.registro');
    //atualizar
    Route::get('/atualizarRegistro/{id}', [RegistroController::class, 'atualizarRegistro'])->name('atualizar.registro');
    Route::put('/atualizarRegistro/{id}', [RegistroController::class, 'atualizarRegistro'])->name('atualizar.registro');


    Route::delete('/delete', [RegistroController::class, 'delete'])->name('registro.delete');

});
