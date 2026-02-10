<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Userlogin extends Authenticatable
{
    protected $primaryKey = 'uid';
    public $timestamps = false;

    use HasFactory;
    protected $table = 'userlogins';
    protected $fillable = [
        'uid', 'username', 'password', 'salt',
    ];
}