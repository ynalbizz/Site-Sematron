<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sematron extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $table = 'sematrons';
    protected $fillable = [
        'sid','name','insc','pre'
    ];
}
