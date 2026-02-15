<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'inscritos' => 'nullable|array',
            'vagas_preenchidas' => 'nullable|integer',
        ]);

        // Cuida do upload da foto se houver
        if ($request->hasFile('foto')) {
            // Gera um nome unico para a foto
            $filename = time() . '_' . Str::random(10) . '.' . $request->foto->extension();
            // armazena a foto na pasta 'eventos' dentro do storage/app/public
            $path = $request->foto->storeAs('eventos', $filename, 'public');
            // Salva o caminho da foto no array validado
            $validated['foto'] = $path;
        }

        Evento::create($validated);

        return redirect()->route('eventos.index')->with('success', 'Evento criado com sucesso!');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        // Find the event
        $evento = Evento::findOrFail($id);
        
        // Validate the request
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|in:minicurso,visita,palestra',
            'max_vagas' => 'required|integer|min:1',
            'data' => 'required|date',
            'horario_inicio' => 'required',
            'horario_fim' => 'required|after:horario_inicio',
            'descricao' => 'required|string',
            'observacao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle photo upload if there is a new one
        if ($request->hasFile('foto')) {
            // Delete old photo if it exists
            if ($evento->foto && Storage::disk('public')->exists($evento->foto)) {
                Storage::disk('public')->delete($evento->foto);
            }
            
            // Generate unique filename
            $filename = time() . '_' . Str::random(10) . '.' . $request->foto->extension();
            // Store the new photo
            $path = $request->foto->storeAs('eventos', $filename, 'public');
            // Add the path to validated data
            $validated['foto'] = $path;
        }

        // Update the event
        $evento->update($validated);

        // Redirect to index with success message
        return redirect()->route('eventos.index')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        
        // Deleta a foto do storage se existir
        if ($evento->foto && Storage::disk('public')->exists($evento->foto)) {
            Storage::disk('public')->delete($evento->foto);
        }

        // Deleta do database
        $evento->delete();
        
        return redirect()->route('eventos.index')->with('success', 'Evento excluído com sucesso!');
    }
}