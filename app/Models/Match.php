<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $table = 'match';

    public static function get_match_by_event_and_race($event_id,$race_id){
        $result = [];
        $lines = LineTeam::where('line_event_id','=',$event_id)
            ->where('line_race_id','=',$race_id)->pluck('line_name')->toArray();
        foreach($lines as $line){
            $result[$line] = Match::select('time_stamp','match_id','match_line_id','set_id','set_score_team_1','set_score_team_2','set_team_win','match_team_1','match_team_2','match_status','match_number')
            ->join('set_match','match_id','=','set_match_id')
            ->join('time','match_time_id','=','time_id')
            ->where('match_event_id','=',$event_id)
            ->where('match_race_id','=',$race_id)
            ->where('match_type','=','match')
            ->where('match_line_id','=',$line)
            ->get()->toArray();
        }
        return $result;
    }

    public static function get_knockout_by_event_and_race($event_id, $race_id){
        // $result = [];
        $result = Match::select('match_team_1_name','match_team_2_name','time_stamp','match_id','match_line_id','set_id','set_score_team_1','set_score_team_2','set_team_win','match_team_1','match_team_2','match_status','match_number')
            ->join('set_match','match_id','=','set_match_id')
            ->join('time','match_time_id','=','time_id')
            ->where('match_event_id','=',$event_id)
            ->where('match_race_id','=',$race_id)
            ->where('match_type','=','knockout')
            ->get()->toArray();
        return $result;
    }

    public static function get_score($teams)
    {
        $result = [];
        foreach($teams as $team){
            $list_team_1[$team] = self::select('match_id')
            ->where("match_team_1",'=',$team)
            ->where("match_type",'=','MATCH')
            ->pluck('match_id')
            ->toArray();
            
            $list_team_2[$team] = self::select('match_id')->where("match_team_2",'=',$team)->pluck('match_id')->toArray();
            $score_1 = SetMatch::select('set_score_team_1')
                ->whereIn('set_match_id',$list_team_1[$team])
                ->pluck('set_score_team_1')->toArray();
            $score_2 = SetMatch::select('set_score_team_2')
                ->whereIn('set_match_id',$list_team_2[$team])
                ->pluck('set_score_team_2')->toArray();
            $score = 0;
            foreach($score_1 as $s){
                $score += $s;
            }
            foreach($score_2 as $s){
                $score += $s;
            }
            $list_math = array_merge($list_team_1[$team],$list_team_2[$team]);
            $result[$team]['total'] = count(SetMatch::whereIn('set_match_id',$list_math)->where('set_team_win',$team)->get());
            $result[$team]['score'] = $score.'/'.((count($score_1)*21)+(count($score_2)*21));
        }
        return $result;
    }
}
