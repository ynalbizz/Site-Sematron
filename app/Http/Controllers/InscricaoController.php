<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Inscricao;

use Illuminate\Support\Facades\Log;

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

        $pack = Pack::findOrFail($dados['pack_id']);

        
        $dados['camiseta'] = '-';
        $dados['minicurso'] = null;
        $dados['viagem'] = null;


        if ($pack->kit == 1) {
            $request->validate(['camiseta' => 'required']);
            $dados['camiseta'] = $request->camiseta;
        }

        $choices = [];

        if ($pack->visita == 1) {
            $request->validate(['visita' => 'required']);
            $choices['v'] = $request->visita;
        }

        if ($pack->minicurso == 1) {
            $request->validate(['minicurso' => 'required']);
            $choices['m'] = $request->minicurso;
        }

        $dados['uid'] = auth()->user()->uid;
        $dados['sid'] = 22;

        $dados['choices'] = json_encode($choices);

        $dados['minicurso'] = 0;
        $dados['viagem'] = 0;
        $dados['gid'] = 3;
        $dados['permissions'] = 0;
        $dados['presence'] = json_encode([]);
        $dados['time'] = now();
        $dados['reserveTime'] = now();

        Log::info('Tentando criar inscrição', ['user_id' => auth()->id(), 'dados' => $dados]);

        Inscricao::create($dados);
        return redirect()->route('inicio')->with('success', 'Inscrição realizada com sucesso!');

    }
}
