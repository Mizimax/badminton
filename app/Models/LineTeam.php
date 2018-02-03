<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineTeam extends Model
{
    // protected $connection = 'mongodb_test';
    protected $table = 'line_team';
    public $timestamps = false;
    
    public static function addTeam($team)
    {
        self::insert($team);
    }

    public static function get_team_list($event_id, $race_id,$line)
    {
        return self::select('line_team_id')
        ->where('line_event_id','=',$event_id)
        ->where('line_name','=',$line)
        ->where('line_race_id','=',$race_id)->first();
    }
}
