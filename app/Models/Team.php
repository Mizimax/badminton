<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Team extends Model
{
    protected $table = 'team';
    protected $fillable = ['team_name', 'team_event_id', 'team_register_by','team_race','team_manager','team_manager_id','team_manager_phone'];   

    public static function get_number_team_can_race($event_id)
    {
        return self::select( 'team_race',DB::raw('count(*) as total'))
        ->where('team_event_id','=',$event_id)
        ->where('team_status', '=', 2)
        ->groupBy('team_race')
        ->get();
    }
}
