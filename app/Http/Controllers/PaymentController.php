<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\FinanceService;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout(Inscricao $inscricao)
    {
        $user = Auth::user();
        $preco = $inscricao->pack->preço;
        $pack_id = $inscricao->pack_id;
        $pack_name = $inscricao->pack->nome;

        $code = 'SEM-' . strtoupper(Str::random(6));

        $linkPagamento = FinanceService::createMercadoPagoPreference($pack_id, $pack_name, $preco, $code);
        
        Sale::create([
            'code' => $code,
            'uid' => $user->uid,
            'pid' => $inscricao->pid,
            'pref_id' => 'aguardando_retorno', 
            'status' => 'waiting',
            'time' => now()
        ]);

        return redirect()->away($linkPagamento);
    }

    public function success(Request $request)
    {
        $collectionId = $request->query('collection_id');
        $status = $request->query('collection_status');
        $preferenceId = $request->query('preference_id');
        $code = $request->query('external_reference');
        
        if($status == 'approved'){
            Sale::where('code', $code)
                ->update([
                    'status' => 'confirmed',
                    'pref_id' => $preferenceId
                ]);
        }

        return Inertia::render('Payment/Success', [
            'payment_id' => $collectionId,
            'status' => $status
        ]);
    }

    public function failure(Request $request) {
                $collectionId = $request->query('collection_id');
        $status = $request->query('collection_status');
        $preferenceId = $request->query('preference_id');
        $code = $request->query('external_reference');
        
        Sale::where('code', $code)
            ->update([
                'status' => 'failed',
                'pref_id' => $preferenceId
            ]);

        return Inertia::render('Payment/Failure'); 
        }

    public function pending() { return Inertia::render('Payment/Pending'); }
}