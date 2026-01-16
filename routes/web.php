<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
Route::get('/', fn () => view('inicio'))->name('home');

Route::get('/inicio', fn () => view('inicio'))->name('inicio');

Route::get('/inscricoes', fn () => view('inscricoes'))->name('inscricoes');

Route::get('/minicursos', fn () => view('minicursos'))->name('minicursos');

Route::get('/visitas', fn () => view('visitas'))->name('visitas');

Route::get('/login', fn () => view('login'))->name('login');

Route::get('/cadastro', fn () => view('cadastro'))->name('cadastro');

Route::get('/maisSematron', fn () => view('maisSematron'))->name('maisSematron');

Route::get('/contato', fn () => view('contato'))->name('contato');

Route::get('/teste', fn () => view('teste'))->name('teste');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
