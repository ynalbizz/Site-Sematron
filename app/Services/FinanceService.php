<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FinanceService
{
    public static function createMercadoPagoPreference($pid, $title, $price) {
        
        $baseUrl = "http://127.0.0.1:8000"; 

        $backUrls = [
            "success" => $baseUrl . "/pagamento/sucesso",
            "failure" => $baseUrl . "/pagamento/erro",
            "pending" => $baseUrl . "/pagamento/pendente"
        ];

        $data = [
            "items" => [
                [
                    "id" => (string)$pid,
                    "title" => $title,
                    "description" => "Inscrição Sematron",
                    "quantity" => 1,
                    "currency_id" => "BRL",
                    "unit_price" => (float)$price
                ]
            ],
            "back_urls" => $backUrls,
            //"auto_return" => "approved" -> Deixar comentado até começar a produção
        ];

        try {
            $response = Http::withOptions(['verify' => false])
                ->withToken(env('MERCADOPAGO_ACCESS_TOKEN'))
                ->post('https://api.mercadopago.com/checkout/preferences', $data);

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