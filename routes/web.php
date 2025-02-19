<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\VitrineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.vitrine.vitrine');
});

Route::prefix('vitrine')->group(function() {
    Route::get('/', [VitrineController::class, 'index'])->name('vitrine.index');
    Route::get('/{id}', [VitrineController::class, 'adicionarDias'])->name('vitrine.adicionar');

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
