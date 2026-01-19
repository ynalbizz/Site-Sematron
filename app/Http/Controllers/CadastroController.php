<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;
use App\Models\userinfo;
use Illuminate\Support\Facades\Hash;

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
        userinfo::create([
            'email' => $request->email,
            'usuario' => $request->usuario,
            'senha' => Hash::make($request->senha),
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'nascimento' => $request->nascimento,
            'telefone' => $request->telefone,
            'cep' => $request->cep,
            'cidade' => $request->cidade,
            'endereco' => $request->endereco,
            'escolaridade' => $request->escolaridade,
            'num_usp' => $request->num_usp,
            'instituicao' => $request->instituicao,
            'curso' => $request->curso,
        ]);
        return redirect()->back()->with('success', 'Cadastro realizado com sucesso!');
    }
}
