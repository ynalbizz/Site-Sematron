<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInfo extends Model
{
    use HasFactory;
    
    protected $table = 'userinfos';

    protected $fillable = [
        'email', 'usuario', 'senha', 'nome', 'cpf', 'rg', 'nascimento', 'telefone', 'cep', 'cidade', 'endereco', 'escolaridade', 'num_usp', 'instituicao', 'curso'
    ];
}
