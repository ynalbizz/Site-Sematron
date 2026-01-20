<?php

namespace App\Http\Controllers;


final class StringGenerator extends Controller
{

    public static function get($len, $upper = true, $lower = true, $numbers = true)
    {
        $token = "";
        $codeAlphabet = "";
        if ($upper) {
            $codeAlphabet .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        }
        if ($lower) {
            $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        }
        if ($numbers) {
            $codeAlphabet .= "0123456789";
        }
        for ($i = 0; $i < $len; $i++) {
            $token .= $codeAlphabet[rand(0, strlen($codeAlphabet) - 1)];
        }
        return $token;
    }
}