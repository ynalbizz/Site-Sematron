<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testeController extends Controller
{
    

 public function show()
    {
        $resultados = DB::select('SELECT uid, name, email FROM userinfo');
        return view('teste',['participantes' => $resultados]);
    }
}
