<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'pack_id',
        'minicurso',
        'viagem',
        'kit',
        'camiseta',
        'time',
        'reserveTime'
    ];

    protected $casts = [
        'choices' => 'array',
        'presence' => 'array',
    ];

    public function pack(): BelongsTo
    {
        return $this->belongsTo(Pack::class, 'pack_id', 'id');
    }
}
