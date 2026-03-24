<?php

namespace App\Models;

// Se o Auth usa este model, ele precisa estender Authenticatable em vez de Model
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Importe o model Sale aqui
use phpDocumentor\Reflection\PseudoTypes\True_;

class Userinfo extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'userinfos';
    
    // Se o seu ID no banco não for 'id', especifique aqui:
    // protected $primaryKey = 'uid';

    protected $fillable = [
        'email', 'uid', 'senha', 'name', 'cpf', 'rg', 
        'nasc', 'tel', 'cep', 'cidade', 'uf', 'address',
        'grau', 'nusp', 'inst', 'curso', 'verified',
        'visibility', 'picture', 'badges',
    ];
}