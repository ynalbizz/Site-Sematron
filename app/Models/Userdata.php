<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $table = 'userdata';
    protected $fillable = [
        'pid','sid','uid','gid','permissions','presence','choices','pack_id','minicurso','viajem','kit','camiseta','time','reserveTime,'
    ];
}
