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
            'pack_id' => 'required',
        ]);

        $pack = Pack::find($dados['pack_id']);

        $dados['kit'] = $request->kit;

        if ($dados['kit'] == 1){
            $request->validate(['camiseta' => 'required']);
            $dados['camiseta'] = $request->camiseta;
        }

        if ($pack->visita == 1) {
            $request->validate(['visita' => 'required']);
            $dados['visita'] = $request->visita;
        }

        if ($pack->minicurso == 1) {
            $request->validate(['minicurso' => 'required']);
            $dados['minicurso'] = $request->minicurso;
        }

        $dados['uid'] = auth()->user()->uid;
        $dados['sid'] = 22;

        $choices = [
            'v' => [$dados['visita']],
            'm' => [$dados['minicurso']],
        ];
        $dados['choices'] = json_encode($choices);

        Inscricao::create($dados);
        return redirect()->route('inicio')->with('success', 'Inscrição realizada com sucesso!');

    }
}
