<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::latest('created_at')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|in:X,Y',
            'max_participantes' => 'required|integer|min:1',
            'data' => 'required|date',
            'horario' => 'required',
            'duracao' => 'required|integer|min:1',
            'descricao' => 'required|string',
            'observacao' => 'nullable|string',
        ]);

        Evento::create($validated);

        return redirect()->back();
    }
}
