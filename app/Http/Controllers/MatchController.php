<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Helper;
use App\Models\Rank;
use App\Models\Race;
use App\Models\Team;
use App\Models\LineTeam;
use App\Models\TeamMember;
use App\Models\TeamType;
use App\Models\Match;
use App\Models\SetMatch;
use App\Models\SpecialEventMember;
use App\Models\SpecialRewards;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class MatchController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public static function add_score($event_id)
    {
        // $event = Event::get_detail($event_id);
        // if(Auth::guest() || $event->event_user_id != Auth::user()->id){
        //     return redirect()->to('/');
        // }
        return view('back/event/add_score');
    }

    public static function search_match($match_id)
    {
        $match = Match::where('match_number',$match_id)
        ->first();
        $teams = [];
        if($match){
            $team1 = TeamMember::select('team_member_team_id','team_name',DB::raw("CONCAT('[',GROUP_CONCAT(CONCAT('{ \"name\":\"', team_member_firstname,'(', team_member_nickname,')','\"}') SEPARATOR ','),']') AS member"))
                        ->join('team','team_id','=','team_member_team_id')
                        ->where('team_member_team_id',$match->match_team_1)->first();
            $team2 = TeamMember::select('team_member_team_id','team_name',DB::raw("CONCAT('[',GROUP_CONCAT(CONCAT('{ \"name\":\"', team_member_firstname,'(', team_member_nickname,')','\"}') SEPARATOR ','),']') AS member"))
                        ->join('team','team_id','=','team_member_team_id')
                        ->where('team_member_team_id',$match->match_team_2)->first();
            $team1->member = json_decode($team1->member);
            $team2->member = json_decode($team2->member);
            if(!$team1->member || !$team1->member){
                return "ไม่พบข้อมูล";
            }
            $teams[]=$team1;
            $teams[]=$team2;
            $set = SetMatch::where('set_match_id',$match->match_id)->get()->toArray();
        }else{
            return "ไม่พบข้อมูล";
        }
        
        return view('back/event/form_score')
            ->with('teams',$teams)
            ->with('set',$set)
            ;
    }

    function edit_score(){
        $input = Input::all();
        $match = Match::where('match_number',$input['match'])->first();
        if($match){
            $set = SetMatch::where('set_match_id',$match->match_id)->get();
            foreach($set as $s){
                $s->set_score_team_1 = $input['team1_'.$s->set_id];
                $s->set_score_team_2 = $input['team2_'.$s->set_id];
                $s->set_team_win = $input['set_team_win_'.$s->set_id];
                $s->save();
            }
            $match->match_status = "END";
            $match->save();
            return back()->with('message', 'update score Match: ' . $input['match']);
        }
        return back()->with('error', 'Error some thing');
        
    }

    function show_table_match($event_id){
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);
        $all_race = [];
        foreach($raw_race as $race){
            $all_race[] = $race->race_id;
        };

        // $all_race);
        // echo "<pre>";
        $lines = LineTeam::whereIn('line_race_id',$all_race)->where('line_event_id',$event_id)->get()->toArray();
        $url = [];
        foreach($lines as $line){
            if($line['line_team_id'] != '[]'){
                $url[] = "/show_line/".$event_id."/".$line['line_race_id']."/".$line['line_name'];
            }
        }
        return $url;
    }

    public function show_line($event_id, $race_id, $line_name){
        $race_name = Race::where('race_id',$race_id)->first()->race_name;
        $detail_match = Match::select('time_stamp','match_id','match_line_id','set_id','set_score_team_1','set_score_team_2','set_team_win','match_team_1','match_team_2','match_status','match_number')
        ->join('set_match','match_id','=','set_match_id')
        ->join('time','match_time_id','=','time_id')
        ->where('match_event_id','=',$event_id)
        ->where('match_race_id','=',$race_id)
        ->where('match_type','=','match')
        ->where('match_line_id','=',$line_name)
        ->get()->toArray();
        
        $result_match[$line_name] = [];
        $teams = json_decode(LineTeam::get_team_list($event_id, $race_id,$line_name)->line_team_id);
        $team_math[$line_name] = TeamMember::get_member($teams);
        $score_team[$line_name] = Match::get_score($teams);
        foreach($detail_match as $m){
            $score = [
                'set_score_team_1' => $m['set_score_team_1'],
                'set_score_team_2' => $m['set_score_team_2'],
                'set_team_win' => $m['set_team_win']
            ];
            if(!isset($result_match[$line_name][$m['match_team_1']][$m['match_team_1']])){
                $result_match[$line_name][$m['match_team_1']][$m['match_team_1']] = [];
            }
            if(!isset($result_match[$line_name][$m['match_team_2']][$m['match_team_2']])){
                $result_match[$line_name][$m['match_team_2']][$m['match_team_2']] = [];
            }
            if(!isset($result_match[$line_name][$m['match_team_1']][$m['match_team_2']])){
                unset($m['set_score_team_1']);
                unset($m['set_score_team_2']);
                unset($m['set_team_win']);
                unset($m['set_id']);
                $result_match[$line_name][$m['match_team_1']][$m['match_team_2']] = $m;
                $result_match[$line_name][$m['match_team_2']][$m['match_team_1']] = $m;
                
            }
            $result_match[$line_name][$m['match_team_1']][$m['match_team_2']]['score'][]=$score;
            $result_match[$line_name][$m['match_team_2']][$m['match_team_1']]['score'][]=$score;
        }
        foreach($result_match[$line_name] as $team_1 =>$a){
            ksort($result_match[$line_name][$team_1]);
        }
        foreach($team_math as $line_name => $line){
            $i=0;
            $color_circle = ['ed3833','fcef4f','42abe2','c7b299'];
            foreach($line as $team => $member){
                $color_team[$line_name][$team] = $color_circle[$i];
                $i++;
            }
        }
        return view('front/event/match_table')
        ->with('result_match',$result_match)
        ->with('race_name',$race_name)
        ->with('color_team',$color_team)
        ->with('score_team',$score_team)
        ->with('team_math',$team_math);
    }
}
