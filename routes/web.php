<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PontoController;
use App\Http\Controllers\HomeController;

$currentDateTime = new DateTime('now');
$currentDateTime = $currentDateTime->format('Y-m-d H:i:s');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::controller(AuthController::class)->group(function () {
    Route::get('cadastrar', 'cadastrar')
        ->name('cadastrar');
    Route::post('cadastrar', 'salvarCadastro')
        ->name('cadastrar.save');

    Route::get('entrar', 'entrar')
        ->name('entrar');
    Route::post('entrar', 'entrarAction')
        ->name('entrar.action');

    Route::get('sair', 'logout')
        ->middleware('auth')
        ->name('sair');
});

Route::controller(PontoController::class)->group(function (){
    Route::get('engine/ponto/{operation?}/{any?}/{timestamp?}', 'ponto')
        ->name('ponto')
        ->defaults('operation', '0')
        ->defaults('any', '0')
        ->defaults('timestamp', $$currentDateTime);
    Route::get('internetest', 'internetest')
        ->name('internetest');
});

Route::middleware(['auth', 'general-access:1'])->group(function () {
    Route::get('/dashboard/ponto', [PontoController::class, 'index'])->name('dashboard.ponto');
});

Route::middleware(['auth', 'maker-access:0', 'era-access:0', 'makesoft-access:0'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/perfil', [DashboardController::class, 'meuperfil'])->name('dashboard.perfil');
});

Route::middleware(['auth', 'makesoft-access:1'])->group(function () {
    Route::get('/dashboard/produtos', [ProductController::class, 'index'])->name('makesoft.produtos');
    Route::get('/dashboard/produtos/criar', [ProductController::class, 'create'])->name('makesoft.produtos.criar');
    Route::post('/dashboard/produtos/armazenar', [ProductController::class, 'store'])->name('makesoft.produtos.armazenar');
    Route::get('/dashboard/produtos/detalhes/{id}', [ProductController::class, 'show'])->name('makesoft.produtos.detalhes');
    Route::get('/dashboard/produtos/editar/{id}', [ProductController::class, 'edit'])->name('makesoft.produtos.editar');
    Route::put('/dashboard/produtos/editar/{id}', [ProductController::class, 'update'])->name('makesoft.produtos.atualizar');
    Route::delete('/dashboard/produtos/destruir/{id}', [ProductController::class, 'destroy'])->name('makesoft.produtos.destruir');
});
