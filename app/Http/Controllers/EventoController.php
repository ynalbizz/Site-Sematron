<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::latest('created_at')->paginate(4);
        
        return view('eventos.index', compact('eventos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|in:minicurso,visita,palestra',
            'max_vagas' => 'required|integer|min:1',
            'data' => 'required|date',
            'horario_inicio' => 'required',
            'horario_fim' => 'required',
            'descricao' => 'required|string',
            'observacao' => 'nullable|string',
        ]);

        Evento::create($validated);

        // Add success message
        return redirect()->back()->with('success', 'Evento criado com sucesso!');
    }
}