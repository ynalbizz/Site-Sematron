<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    public $timestamps = false;
    protected $table = 'pack';
    protected $fillable = [
        'id',
        'sid',
        'nome',
        'preço',
        'palestra',
        'minicurso',
        'visita',
        'kit',
    ];

}
