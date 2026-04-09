<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Userinfo;
use App\Models\Userlogin;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\StringGenerator;


class CadastroController extends Controller
{
    public function create(){
        return view('cadastro');
    }
    
    public function store(Request $request){
        Log::info('CadastroController@store called with data: ' . json_encode($request->all()));
        $request->validate([
            'email' => 'required|email|unique:userinfos',
            'cpf'   => 'required|unique:userinfos',
        ]);
        Log::info('Validation passed for email: ' . $request->email . ' and cpf: ' . $request->cpf);
        try {
            $this->create_user($request);
            Log::info('User created successfully for email: ' . $request->email);
            return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login para continuar.');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Ocorreu um erro ao criar o usuário. Por favor, tente novamente.']);
        }
    }

    public function create_user(Request $request){
        $request->validate([
            'email' => 'required|email|unique:userinfos',
            'cpf'   => 'required|unique:userinfos',
        ]);

        Userinfo::create([
            'email' => $request->email,
            'name' => $request->nome,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'nasc' => $request->nascimento,
            'tel' => $request->telefone,
            'cep' => $request->cep,
            'cidade' => $request->cidade,
            'uf' => 'SP' ,
            'address' => $request->endereco,
            'grau' => 0,
            'nusp' => $request->num_usp,
            'inst' => $request->instituicao,
            'curso' => $request->curso,
            'exp' => '',
            'badges' => '',
            'verified' => 0,
        ]);

        $salt = StringGenerator::get(64);

        Userlogin::create([
            'username' => $request->usuario,
            'salt' =>  $salt,
            'password' => hash('sha256', $request->senha . $salt),
        ]);
    }
}
