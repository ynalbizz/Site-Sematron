<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admController extends Controller
{
     public function showInscList()
    {
        $resultados = DB::select('SELECT uid, name, email FROM userinfo');
        return view('adm_list_insc',['participantes' => $resultados]);
    }
}
