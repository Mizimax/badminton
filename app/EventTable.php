<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTable extends Model
{
    protected $primaryKey = 'Event_id';

    protected $guarded = ['Event_id'];
}
