<?php

use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('registros')->group(function() {
    Route::get('/', [RegistroController::class, 'index'])->name('registro.index');

});
