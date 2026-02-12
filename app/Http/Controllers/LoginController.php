<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StringGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Models\Userinfo;


class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {

        $credentials = $request->validate([

            'email' => ['required', 'email'],

            'senha' => ['required'],

        ]);

        $User = Userinfo::where('email', $credentials['email'])->first();

        if (!$User)
        {
            return back()->withErrors([
                'email' => 'O e-mail informado não foi encontrado.',
            ])->onlyInput('email');
        }

        $dados['uid'] = $User -> uid ;
        $dados['password'] = $credentials['senha'];


        if (Auth::attempt($dados)) {

            $request->session()->regenerate();

            return redirect()->route('inscricoes.create');

        }

        return back()->withErrors([
        'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');

    }
}
