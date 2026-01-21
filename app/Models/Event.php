<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'eid';
    public $fillable = [
        'eid', 'type', 'start', 'end', 'name', 'info', 'extra', 'sid', 'ts',
    ];
}
