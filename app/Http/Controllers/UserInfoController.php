<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:userinfos,email',
            'senha' => 'required',
            'nome' => 'required',
            'cpf' => 'required',
            'nascimento' => 'required|date',
        ]);

        UserInfo::create([
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

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInfo $userInfo)
    {
        //
    }
}
