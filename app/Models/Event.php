<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // protected $connection = 'mongodb_test';
    protected $table = 'event';
    public static function get_detail($event_id)
    {
        return Event::where('event_id',$event_id)->first();
    }
}
