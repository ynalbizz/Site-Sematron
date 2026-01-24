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
    ];
}
