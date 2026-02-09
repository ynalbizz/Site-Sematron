<?php

use App\Http\Controllers\admController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\testeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => view('inicio'))->name('home');
Route::get('/inicio', fn () => view('inicio'))->name('inicio');

// Páginas Institucionais
Route::get('/inscricoes', fn () => view('inscricoes'))->name('inscricoes');
Route::get('/minicursos', fn () => view('minicursos'))->name('minicursos');
Route::get('/visitas', fn () => view('visitas'))->name('visitas');
Route::get('/maisSematron', fn () => view('maisSematron'))->name('maisSematron');
Route::get('/contato', fn () => view('contato'))->name('contato');
Route::get('/login', fn () => view('login'))->name('login');
Route::get('/cadastro', fn () => view('cadastro'))->name('cadastro');
Route::get('/adm/list', [admController::class, 'showInscList'])->name('adm.list');
Route::get('/teste', [testeController::class, 'show']);

//para acessar aqui tem que fazer login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    //Módulo de Pagamento (Mercado Pago)
    Route::get('/pagar', [PaymentController::class, 'checkout'])->name('pagar');
    
    //Retornos do Mercado Pago
    Route::get('/pagamento/sucesso', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/pagamento/erro', [PaymentController::class, 'failure'])->name('payment.failure');
    Route::get('/pagamento/pendente', [PaymentController::class, 'pending'])->name('payment.pending');
});


//rotas de teste, apagar quando entrar em produção
Route::get('/testar-pagamento', function () {
    // Cria ou recupera usuário teste
    $user = User::firstOrCreate(
        ['email' => 'teste@sematron.com.br'],
        [
            'name' => 'Aluno Teste',
            'password' => Hash::make('senha123'),
        ]
    );

    // Força Login
    Auth::login($user);

    // Redireciona para o checkout real
    return redirect()->route('payment.checkout');
});

// Carrega configurações extras (se houver)
require __DIR__.'/settings.php';