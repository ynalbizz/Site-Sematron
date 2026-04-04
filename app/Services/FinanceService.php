<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use function Symfony\Component\String\s;

use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Order\OrderClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;





class FinanceService
{
    public static function createPreferenceRequest($pack_id, $pack_name, $price, $code, $title): array
    {
    $baseUrl = config('app.url'); 

        $backUrls = [
            "success" => $baseUrl . "pagamento/sucesso",
            "failure" => $baseUrl . "pagamento/erro",
            "pending" => $baseUrl . "pagamento/pendente"
        ];

        $paymentMethods = [
            "default_payment_method_id" => "pix",
            "excluded_payment_types" => [['id' => 'ticket']],
            "default_installments" => 1,
            "installments" => 12
        ];

        $request = [
            "items" => array(array(
                "id" => (string)$pack_id,
                "title" => $title,
                "description" => $pack_name,
                "quantity" => 1,
                "currency_id" => "BRL",
                "unit_price" => (float)$price
            )),
            "payment_methods" => $paymentMethods,
            "back_urls" => $backUrls,
            "statement_descriptor" => "Inscrição Sematron",
            "external_reference" => $code,
            "expires" => true,
            "expiration_date_from" => now()->toIso8601String(),
            "expiration_date_to" => now()->addMinutes(30)->toIso8601String(),
            "notification_url" => $baseUrl. "api/mercadopago/webhook",
            //Testar essa BUDEGA
            "auto_return" => "approved"
        ];

        return $request;
    }


    public static function createMercadoPagoPreference($pack_id, $pack_name, $price, $code, $title) {  
        //MercadoPagoConfig::setAccessToken(config('integrations.mercadopago.access_token'));
        $request = self::createPreferenceRequest($pack_id, $pack_name, $price, $code, $title);
        Log::info("Criando preferência de pagamento com os seguintes dados:", $request);
        $client = new PreferenceClient();

        try {
            $preference = $client->create($request);
            return $preference; 
        } catch (MPApiException $e) {
            // Aqui pegamos o conteúdo real da resposta de erro da API
            $erroReal = $e->getApiResponse()->getContent();

            // Damos um dd() para exibir o JSON com os detalhes exatos na tela
            dd([
                'Mensagem Genérica' => $e->getMessage(),
                'Detalhes do Erro na API' => $erroReal
            ]);
        }
    }

    public static function get_preference($pref_id) {
        $client = new PreferenceClient();
        try {
            $preference = $client->get($pref_id);
            return $preference; 
        } catch (MPApiException $e) {
            dd("ERRO CRÍTICO:", $e->getMessage());
            return '/inicio';
        }
    }
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       