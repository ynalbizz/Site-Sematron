<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'events';
    protected $fillable = ['eid', 'type', 'start', 'end', 'name', 
        'info','slots', 'extra', 'sid', 'ts'];
}
