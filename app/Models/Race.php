<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'race_type';
    public static function get_race_by_list($race)
    {
        return self::whereIn('race_id',$race)->get();
    }
}
