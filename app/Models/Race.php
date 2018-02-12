<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'race_type';
    public static function get_race_by_list($races)
    {
        $race_list;
        foreach($races as $race){
            $race_list[] = self::where('race_id',$race)->first();
        }
        return $race_list;
    }
}
