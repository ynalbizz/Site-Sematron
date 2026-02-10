<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Eventos; //grupo 3!!!!!!

class PagamentoController extends Controller
{
    public function confirmar($pid){
        $inscrição = Inscricao::findOrFail($pid);
    }
}

public function confirmar($pid){
    DB::transaction(function () use ($pid){
        $inscricao = Inscrição::findOrFail($pid)

        if (!empty($inscricao->choices['m'])){
            foreach($inscricao->['m'] as $id){
                $evento = Event::where('id', $id)->where('tipo', 'minicurso')->lockForUpdate()->first();
                
                if(!evento) continue;

                $ocupadas = Inscricao::where('minicurso', $id)->count();

                if ($ocupadas < $evento->max_vagas){
                    $insricao->minicurso = $id;
                    $inscricao->save();
                    break;
                }
            }
        }

        if(!empty($inscricao->choices['v'])){
            foreach($inscricao->choices['v'] as $id){
                $evento = Event::where('id', $id)->where('tipo', 'visita')->lockForUpdate()->first();

                if(!$evento) continue;

                $ocupadas = Inscricao::where('viagem', $id)->count();

                if($ocupadas < $eventos->max_vagas){
                    $inscricao->viagem = $id;
                    $inscricao->save();
                    break;
                }
            }
        }

        $inscrição->status = 'pago';
        $inscrição->save();
    });

    return redirect()->route('inicio')->with('success', 'Pagamento confirmado!');
}


