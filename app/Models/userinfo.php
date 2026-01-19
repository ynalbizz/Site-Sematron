<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    use HasFactory;
    protected $table = 'userinfos';
    protected $fillable = [
        'email', 'usuario', 'senha', 'nome', 'cpf', 'rg', 
        'nascimento', 'telefone', 'cep', 'cidade', 'endereco',
        'escolaridade', 'num_usp', 'instituicao', 'curso'
    ];
}
