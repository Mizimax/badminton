<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class TeamMember extends Model
{
    protected $table = 'team_member';
    public static function get_member($teams){
        $result = [];
        foreach($teams as $team){
            $result[$team] = json_decode(self::select(DB::raw("CONCAT('[',GROUP_CONCAT(CONCAT('{ \"name\":\"', team_member_firstname,'(', team_member_nickname,')','\"}') SEPARATOR ','),']') AS member") )
            ->where("team_member_team_id",'=',$team)
            ->first()->member);
        }
        
        return $result;
    }   
}
