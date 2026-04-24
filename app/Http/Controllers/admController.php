<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admController extends Controller
{
     public function showInscList()
    {  
        $resultados = DB::select('SELECT 
                                    userdata.uid, 
                                    userinfos.name, 
                                    userinfos.email, 
                                    userinfos.cpf, 
                                    sales.code 
                                 FROM userdata
                                 INNER JOIN userinfos ON userdata.uid = userinfos.uid
                                 INNER JOIN sales ON userdata.pid = sales.pid
                                 WHERE userdata.sid = 22');
    
        return view('adm_list_insc',['participantes' => $resultados]);
    }
}
