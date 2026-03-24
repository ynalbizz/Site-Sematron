<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;
use App\Services\FinanceService;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function checkout(Inscricao $inscricao)
    {
        $user = Auth::user();
        if ($inscricao->alojamento) {
            $preco = $inscricao->pack->preço + 100; // Exemplo de valor adicional para alojamento
            $pack_name =$inscricao->pack->nome . ' com Alojamento';
            $title = 'Inscrição Sematron - ' . $pack_name;
        } else {
            $preco = $inscricao->pack->preço;
            $pack_name = $inscricao->pack->nome;
            $title = 'Inscrição Sematron - ' . $pack_name;
        }
        $pack_id = $inscricao->pack_id;

        $code = 'SEM-' . strtoupper(Str::random(10)) . '-' . time();

        $pref = FinanceService::createMercadoPagoPreference($pack_id, $pack_name, $preco, $code, $title);
        
        Sale::create([
            'code' => $code,
            'uid' => $user->uid,
            'pid' => $inscricao->pid,
            'pref_id' => $pref->id,
            'status' => 'waiting',
            'time' => now()
        ]);

        return redirect()->away($pref->init_point);
    }

    public function resume_payment()
    {
            $user = Auth::user();
            $sale = Sale::where('uid', $user->uid)->where('status', 'waiting')->first();
    
            if (!$sale) {
                return redirect('/inicio')->with('error', 'Nenhuma inscrição pendente encontrada.');
            }
    
            $prefId = $sale->pref_id;

            $url = FinanceService::get_preference_url($prefId);
            return redirect()->away($url);
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
        return redirect('/inicio')->with('success', 'Pagamento realizado com sucesso! Agradecemos sua inscrição.');
    }

    public function failure(Request $request)
    {
        $preferenceId = $request->query('preference_id');
        $code = $request->query('external_reference');
        
        Sale::where('code', $code)
            ->update([
                'status' => 'failed',
                'pref_id' => $preferenceId
            ]);

        return redirect('/inicio')->with('error', 'O pagamento foi cancelado ou ocorreu um erro. Por favor, tente novamente.');
    }

    public function pending(Request $request) 
    {
        $preferenceId = $request->query('preference_id');
        $code = $request->query('external_reference');
        
        Sale::where('code', $code)
            ->update([
                'status' => 'failed',
                'pref_id' => $preferenceId
            ]);

        return redirect('/inicio')->with('error', 'O pagamento foi cancelado ou ocorreu um erro. Por favor, tente novamente.');
    
    }

    public function webhook(Request $request)
    {
        $action = $request->query('action'); // "payment.created", "payment.updated", etc.

        // Obtain the x-signature value from the header
        $xSignature = $request->header('X-Signature');
        $xRequestId = $request->header('X-Request-ID');

        // Obtain Query params related to the request URL
        $queryParams = $request->query();

        // Extract the "data.id" from the query params
        $dataID = isset($queryParams['data.id']) ? $queryParams['data.id'] : '';

        // Separating the x-signature into parts
        $parts = explode(',', $xSignature);

        // Initializing variables to store ts and hash
        $ts = null;
        $hash = null;

        // Iterate over the values to obtain ts and v1
        foreach ($parts as $part) {
            // Split each part into key and value
            $keyValue = explode('=', $part, 2);
            if (count($keyValue) == 2) {
                $key = trim($keyValue[0]);
                $value = trim($keyValue[1]);
                if ($key === "ts") {
                    $ts = $value;
                } elseif ($key === "v1") {
                    $hash = $value;
                }
            }
        }

        // Obtain the secret key for the user/application from Mercadopago developers site
        $secret = config('integrations.mercadopago.webhook_key');

        // Generate the manifest string
        $manifest = "id:$dataID;request-id:$xRequestId;ts:$ts;";

        // Create an HMAC signature defining the hash type and the key as a byte array
        $sha = hash_hmac('sha256', $manifest, $secret);
        if ($sha === $hash) {
            // HMAC verification passed
            echo "HMAC verification passed";
        } else {
            // HMAC verification failed
            echo "HMAC verification failed";
        }




    }
}