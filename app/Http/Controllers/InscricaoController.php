<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Inscricao;

class InscricaoController extends Controller
{

    public function create()
    {
        return view('inscricoes');
    }
    public function store(Request $request)
    {
        $dados = $request->validate([
            'pack_id' => 'required|exists:pack,id',
        ]);

        $pack = Pack::findOrFail($dados['pack_id']);

        $dados['kit'] = $request->kit ?? 0;

        if ($dados['kit'] == 1){
            $request->validate(['camiseta' => 'required']);
            $dados['camiseta'] = $request->camiseta;
        }

        if ($pack->visita == 1) {
            $request->validate(['visita' => 'required|array|min:1']);
            $choices['v'] = $request->visitas;
        }

        if ($pack->minicurso == 1) {
            $request->validate(['minicurso' => 'required|array|min:1']);
            $choices['m'] = $request->minicurso;
        }

        $dados['uid'] = auth()->user()->uid;
        $dados['sid'] = 22;

        $dados['choices'] = $choices;

        $dados['minicurso'] = 0;
        $dados['viagem'] = 0; 

        Inscricao::create($dados);
        return redirect()->route('inicio')->with('success', 'Inscrição realizada com sucesso!');

    }
}
