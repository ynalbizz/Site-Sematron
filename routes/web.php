<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\testeController;
use App\Http\Controllers\admController; 
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;


Route::get('/', fn () => view('inicio'))->name('home');

Route::get('/inicio', fn () => view('inicio'))->name('inicio');

Route::get('/inscricoes', fn () => view('inscricoes'))->name('inscricoes');

Route::get('/minicursos', fn () => view('minicursos'))->name('minicursos');

Route::get('/visitas', fn () => view('visitas'))->name('visitas');

Route::get('/login', fn () => view('login'))->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.autenticar');

Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro');

Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.salvar');

Route::get('/maisSematron', fn () => view('maisSematron'))->name('maisSematron');

Route::get('/contato', fn () => view('contato'))->name('contato');

Route::get('/adm/list', [App\Http\Controllers\admController::class, 'showInscList'])->name('adm.list');

Route::get('/teste',[testeController::class,'show']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
