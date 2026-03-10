<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',           
        'pref_id',
        'uid',
        'status',
        'time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}