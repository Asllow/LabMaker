<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('cadastrar', 'cadastrar')
        ->name('cadastrar');
    Route::post('cadastrar', 'salvarCadastro')
        ->name('cadastrar.save');

    Route::get('entrar', 'entrar')
        ->name('entrar');
    Route::post('entrar', 'entrarAction')
        ->name('entrar.action');

    Route::get('logout', 'logout')
        ->middleware('auth')
        ->name('logout');
});

Route::controller(PontoController::class)->group(function (){
    Route::get('engine/ponto/{operation?}/{any?}/{timestamp?}', 'ponto')
        ->name('ponto')
        ->defaults('operation', '0')
        ->defaults('any', '0')
        ->defaults('timestamp', '0');
    Route::get('internetest', 'internetest')
        ->name('internetest');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');