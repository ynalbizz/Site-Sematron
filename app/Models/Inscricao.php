<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    public $timestamps = false;
    public $primaryKey = 'pid';

    use HasFactory;

    protected $table = 'userdata';
    protected $fillable = [
        'pid',
        'sid',
        'uid',
        'gid',
        'permissions',
        'presence',
        'choices',
        'pack',
        'minicurso',
        'viagem',
        'kit',
        'camiseta',
        'time',
        'reserveTime'
    ];
}
