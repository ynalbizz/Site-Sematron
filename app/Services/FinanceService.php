<?php

namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
            "excluded_payment_methods" => [],
            "installments" => 12,
            "default_installments" => 1
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
            "notification_url"
             => 'http://test.com',
            //Testar essa BUDEGA
            "auto_return" => "approved"
        ];

        return $request;
    }


    public static function createMercadoPagoPreference($pack_id, $pack_name, $price, $code, $title) {  
        //MercadoPagoConfig::setAccessToken(config('integrations.mercadopago.access_token'));
        $request = self::createPreferenceRequest($pack_id, $pack_name, $price, $code, $title);  
        $client = new PreferenceClient();

        try {
            $preference = $client->create($request);
            return $preference; 
        } catch (MPApiException $e) {
            dd("ERRO CRÍTICO:", $e->getMessage());
        }
    }

    public static function get_preference_url($pref_id) {
        $client = new PreferenceClient();
        try {
            $preference = $client->get($pref_id);
            return $preference->init_point; 
        } catch (MPApiException $e) {
            dd("ERRO CRÍTICO:", $e->getMessage());
            return '/inicio';
        }
    }
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       