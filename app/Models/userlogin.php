<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userlogin extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $table = 'userlogins';
    protected $fillable = [
        'uid', 'username', 'pass', 'salt',
    ];
}