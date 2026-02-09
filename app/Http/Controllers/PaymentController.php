<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\FinanceService;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout()
    {
        $user = Auth::user();
        $titulo = "Inscrição Sematron XXII";
        $preco = 15.50;
        $idProduto = "INSCRICAO-001"; 

        $linkPagamento = FinanceService::createMercadoPagoPreference($idProduto, $titulo, $preco);
        
        Sale::create([
            'code' => 'SEM-' . strtoupper(Str::random(6)),
            'user_id' => $user->id,
            'preference_id' => 'aguardando_retorno', 
            'status' => 'pending',
            'amount' => $preco
        ]);

        return redirect()->away($linkPagamento);
    }

    public function success(Request $request)
    {
        $collectionId = $request->query('collection_id');
        $status = $request->query('collection_status');
        $preferenceId = $request->query('preference_id');
        
        if($status == 'approved'){
            Sale::where('user_id', Auth::id())
                ->where('status', 'pending')
                ->latest()
                ->first()
                ?->update([
                    'status' => 'paid',
                    'preference_id' => $preferenceId
                ]);
        }

        return Inertia::render('Payment/Success', [
            'payment_id' => $collectionId,
            'status' => $status
        ]);
    }

    public function failure() { return Inertia::render('Payment/Failure'); }
    public function pending() { return Inertia::render('Payment/Pending'); }
}