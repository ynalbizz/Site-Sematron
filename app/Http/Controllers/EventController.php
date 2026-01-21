<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userinfo;

class EventController extends Controller
{
    public function EditarEvento(Request $request) : RedirectResponse {

        $dados = $request->validate([
            'eid' => ['required'],
            'name' => ['required'],
            'type' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
            'info' => ['required'],
            'extra' => ['required'],
        ]);

        $evento = Event::findOr($dados['eid'], function() {
            Event::create([
                            'name' => $request -> name,
                            'type' => $request -> type,
                            'start' => $request -> start,
                            'end' => $request -> end,
                            'info' => $request -> info,
                            'extra' => $request -> extra,

            ]);
            return redirect()->route('adm.list');
        });

        if ($evento -> name !== $dados['name'])
        {
            $evento -> name = $dados['name'];
        }

        if ($evento -> name !== $dados['type'])
        {
            $evento -> name = $dados['type'];
        }

        if ($evento -> name !== $dados['start'])
        {
            $evento -> name = $dados['start'];
        }

        if ($evento -> name !== $dados['end'])
        {
            $evento -> name = $dados['end'];
        }

        if ($evento -> name !== $dados['info'])
        {
            $evento -> name = $dados['info'];
        }

        if ($evento -> name !== $dados['extra'])
        {
            $evento -> name = $dados['extra'];
        }

        $evento -> save();

        return redirect()->route('adm.list');

    }
}
