<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userinfo extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $table = 'userinfos';
    protected $fillable = [
        'email', 'uid', 'senha', 'name', 'cpf', 'rg', 
        'nasc', 'tel', 'cep', 'cidade', 'uf', 'address',
        'grau', 'nusp', 'inst', 'curso', 'verified',
        'visibility', 'picture', 'badges',
    ];
}
