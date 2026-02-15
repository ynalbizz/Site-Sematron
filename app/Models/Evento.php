<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos'; 

    protected $fillable = [
        'nome',
        'tipo',
        'max_vagas',
        'data',
        'horario_inicio',
        'horario_fim',
        'descricao',
        'observacao',
        'foto',
        'inscritos',
    ];

    protected $casts = [
        'inscritos' => 'array',
        'data' => 'date', // ADICIONE ESTA LINHA
    ];

    public function getVagasPreenchidasAttribute()
    {
        if (!$this->inscritos) {
            return 0;
        }

        return count(array_unique($this->inscritos));
    }
}