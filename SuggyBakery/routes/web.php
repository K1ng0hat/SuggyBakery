<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendienteController;

Route::get('/', function () {
    return view('index');
});

Route::get('/pendientes', [PendienteController::class, 'index'])->name('pendientes.index');
Route::post('/pendientes', [PendienteController::class, 'store'])->name('pendientes.store');
