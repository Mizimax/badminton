<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
class event_tables extends Model
{
    protected $primaryKey = 'Event_id';

    protected $guarded = ['Event_id'];


}
