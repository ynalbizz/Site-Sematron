<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',           
        'user_id',
        'preference_id',
        'status',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}