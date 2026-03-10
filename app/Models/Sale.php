<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'code',           
        'pref_id',
        'uid',
        'status',
        'time'
    ];
}