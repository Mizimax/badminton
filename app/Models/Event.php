<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // protected $connection = 'mongodb_test';
    protected $table = 'event';
    protected $guarded = ['event_id'];
    public static function get_detail($event_id)
    {
        return Event::where('event_id',$event_id)->first();
    }

    public static function get_list_race_from_event($event_id, $raw_race){
        $race = [];
        $can_register = [];
        $max_register = [];
        $number_teams = Team::get_number_team_can_race($event_id);
        foreach($raw_race as $r){
            array_push($race,$r->race_id);
            $can_register[$r->race_id] = $r->count;
        }
        $list_races = Race::get_race_by_list($race);
        $i = 0;
        foreach($list_races as $list_race){
            $list_race->status = isset($raw_race[$i]->status) ? $raw_race[$i]->status: 0;
            $i++;
            $list_race->can_register = $can_register[$list_race->race_id];
            $list_race->max_register = $can_register[$list_race->race_id];
            foreach($number_teams as $number_team){
                if($list_race->race_id ==$number_team['team_race'] ){
                    $list_race->can_register = $can_register[$list_race->race_id]- $number_team['total'];
                    $list_race->max_register = $can_register[$list_race->race_id];
                }
            }
        }

        return $list_races;
    }
}
