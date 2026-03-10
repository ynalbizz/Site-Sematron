<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

use function Symfony\Component\String\s;

class FinanceService
{
    public static function createMercadoPagoPreference($pack_id, $pack_name, $price, $code) {
        
        $baseUrl = config('app.url'); 

        $backUrls = [
            "success" => $baseUrl . "/pagamento/sucesso",
            "failure" => $baseUrl . "/pagamento/erro",
            "pending" => $baseUrl . "/pagamento/pendente"
        ];

        $paymentMethods = [
            "excluded_payment_methods" => [],
            "installments" => 12,
            "default_installments" => 1
        ];

        $request = [
            "items" => [
                "id" => (string)$pack_id,
                "title" => "Inscrição Sematron",
                "description" => $pack_name,
                "quantity" => 1,
                "currency_id" => "BRL",
                "unit_price" => (float)$price
                ],
            "payment_methods" => $paymentMethods,
            "back_urls" => $backUrls,
            "statement_descriptor" => "Inscrição Sematron",
            "external_reference" => $code,
            //"auto_return" => "approved" -> Deixar comentado até começar a produção
        ];

        try {
            $response = Http::withOptions(['verify' => false])
                ->withToken(config('integrations.mercadopago.access_token'))
                ->post(config('integrations.mercadopago.url'), $request);

            if ($response->successful()) {
                $preference = $response->json();
                return $preference['init_point']; 
            } else {
                dd("ERRO MP:", $response->json());
            }

        } catch (\Exception $e) {
            dd("ERRO CRÍTICO:", $e->getMessage());
        }
    }
}