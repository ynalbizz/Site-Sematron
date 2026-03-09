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
use Laravel\Fortify\Features;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InscricaoController;
use App\Http\Middleware\AutenticacaoInscricao;
use Illuminate\Http\Request;



Route::get('/', fn () => view('inicio'))->name('home');
Route::get('/inicio', fn () => view('inicio'))->name('inicio');

Route::get('/inscricao' , fn () => redirect('inscricao/create'));
Route::resource('inscricao', InscricaoController::class) ->only(['create', 'store']) ->middleware(AutenticacaoInscricao::class);

Route::get('/cadastro' , fn () => redirect('cadastro/create'));
Route::resource('cadastro', CadastroController::class) ->only(['create', 'store']);

Route::get('/minicursos', fn () => view('minicursos'))->name('minicursos');
Route::get('/visitas', fn () => view('visitas'))->name('visitas');

Route::get('/login', fn () => view('login'))->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.autenticar');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request.session()->invalidate();
    $request.session()->regenerateToken();
    return redirect('/inicio');
})->name('logout');


Route::get('/maisSematron', fn () => view('maisSematron'))->name('maisSematron');
Route::get('/contato', fn () => view('contato'))->name('contato');
Route::get('/login', fn () => view('login'))->name('login');
Route::get('/cadastro', fn () => view('cadastro'))->name('cadastro');
Route::get('/adm/list', [admController::class, 'showInscList'])->name('adm.list');
Route::get('/teste', [testeController::class, 'show']);

Route::get('/esqueceu-a-senha', fn () => view('esqueceu-a-senha'))->name('esqueceu-a-senha');

Route::get('/pao', fn () => view('pao'))->name('pao');

Route::get('/perfil', fn () => view('perfil'))->name('perfil');

Route::get('/adm/list', [admController::class, 'showInscList'])->name('adm.list');

Route::post('/inscricoes', [InscricaoController::class, 'store']);

Route::get('/teste',[testeController::class,'show']);

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