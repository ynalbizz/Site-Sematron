<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\Userinfo;
use App\Models\Userlogin;

use App\Http\Controllers\StringGenerator;

class CadastroController extends Controller
{
    public function index(){
        return view('cadastro');
    }
    
    public function store(Request $request){
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
            'exp' => 'pqp',
            'badges' => '[6]',
            'verified' => 0,
        ]);

        $salt = StringGenerator::get(64);

        Userlogin::create([
            'username' => $request->usuario,
            'salt' =>  $salt,
            'password' => hash('sha256', $request->senha . $salt),
        ]);
        
        return redirect()->back()->with('success', 'Cadastro realizado com sucesso!');
    }
}
