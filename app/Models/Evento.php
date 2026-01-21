<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos'; 

    protected $fillable = [
        'nome',
        'tipo',
        'max_participantes',
        'data',
        'horario',
        'duracao',
        'descricao',
        'observacao',
    ];
}
