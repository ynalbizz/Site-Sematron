<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Event;
use \App\Models\Userinfo;
use \App\Models\Userdata;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function inicio()
    {
        $n_visitas = Event::where([
            ['type', 'viagem'],
            ['sid', config('general.sematron_atual')]
        ])->get()->count();
        $n_mcursos = Event::where([
            ['type', 'minicurso'],
            ['sid', config('general.sematron_atual')]
        ])->get()->count();
        $n_palestras = Event::where([
            ['type', 'palestra'],
            ['sid', config('general.sematron_atual')]
        ])->get()->count();
        return view('inicio', ['n_visitas' => $n_visitas, 'n_mcursos' => $n_mcursos, 'n_palestras' => $n_palestras]);
    }
    public function minicursos()
    {
        $mcursos = Event::where([
            ['type', 'minicurso'],
            ['sid', config('general.sematron_atual')]
        ])->get();
        return view('minicursos', ['mcursos' => $mcursos]);
    }
    public function visitas()
    {
        $visitas = Event::where([
            ['type', 'viagem'],
            ['sid', config('general.sematron_atual')]
        ])->get();
        return view('visitas', ['visitas' => $visitas]);
}

    public function palestras()
    {
        $palestras = Event::where([
            ['type', 'palestra'],
            ['sid', config('general.sematron_atual')]
        ])->get();
        return view('palestras', ['palestras' => $palestras]);
}

    public function perfil()
    {
        $n_palestras = Event::where([
            ['type', 'palestra'],
            ['sid', config('general.sematron_atual')]
        ])->get()->count();

//        $user = Auth::user();

        $user = Userdata::where('uid', 3)
                            ->where('sid', config('general.sematron_atual'))
                            ->first();
        
        
        $presence = is_string($user->presence) 
            ? json_decode($user->presence, true) 
            : $user->presence;
        

        
        $totalPresenca = count($presence);
        
        return view('perfil', ['n_palestras' => $n_palestras, 'totalPresenca' => $totalPresenca]);
}
}
