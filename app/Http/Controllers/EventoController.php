<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        //Cuida do upload da foto se houver
        if ($request->hasFile('foto')) {

        //Gera um nome unico para a foto
        $filename = time() . '_' . Str::random(10) . '.' . $request->foto->extension();

        //armazena a foto na pasta 'eventos' dentro do storage/app/public
        $path = $request->foto->storeAs('eventos', $filename, 'public');
        
        //Salva o caminho da foto no array validado
        $validated['foto'] = $path;
        }

        Evento::create($validated);

        //adiciona mensagem de sucesso
        return redirect()->back()->with('success', 'Evento criado com sucesso!');
    }
}