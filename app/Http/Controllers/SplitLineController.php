<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Event;
use App\Models\Rank;
use App\Models\Race;
use App\Models\Team;
use App\Models\LineTeam;
use App\Models\Helper;
use App\Models\Math;
use DB;
use DateTime;
use DateTimeZone;

class SplitLineController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function split($event_id)
    {
        echo "<pre>";
        if(count(LineTeam::where('line_event_id','=',$event_id)->get())){
            echo "bye";
            die();
        }
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);
        $this->group = [];
        $this->group_id = [];
        foreach($raw_race as $race){
            $race_id = $race->race_id;
            $this->group[$race_id] = [];
            $this->group_id[$race_id] = [];
            $members = Team::select('team_name','team_id')
            ->where("team_event_id",$event_id)
            ->where('team_race','=',$race_id)
            // ->where('team_payment','=',1)
            ->get()
            ;

            $team = $members->toArray();
            shuffle($team);
            $max_group = $race->count/4;
            for($number_group = 1; $number_group<=$max_group;$number_group++){
                if(!in_array($number_group,$this->group)){
                    $this->group[$race_id][$number_group] = [];
                    $this->group_id[$race_id][$number_group] = [];
                }   
            }
            while($element = array_pop($team)){
                $this->split_group($race_id,$element['team_name'],$element['team_id'],$max_group);
            }    
        }
        foreach($this->group_id as $race_id => $race){
            if($race_id == 30 ){
                $index_char = 65;
                foreach($race as $group){
                    $line_name = chr($index_char);
                    $team = [
                        'line_name' => $line_name, 
                        'line_event_id' => $event_id, 
                        'line_race_id' => $race_id
                    ];
                    $line_team_id = [];
                    foreach($group as $team_id){
                        array_push($line_team_id,$team_id);
                    }
                    $team['line_team_id']= json_encode($line_team_id);
                    LineTeam::addTeam($team);
                    $index_char++;
                }
            }
        }
    }

    function split_group($race_id,$team_name,$team_id,$max_group){
        for($number_group = 1; $number_group<=$max_group;$number_group++){
            if(!in_array($team_name,$this->group[$race_id][$number_group]) && sizeof($this->group[$race_id][$number_group]) < 4){
                array_push($this->group[$race_id][$number_group],$team_name);
                array_push($this->group_id[$race_id][$number_group],$team_id);
                break;
            }elseif($number_group == $max_group){
                array_push($this->group[$race_id][$number_group],$team_name);
                array_push($this->group_id[$race_id][$number_group],$team_id);
            }
        }
    }

    public function run_math($event_id)
    {    
        echo "<pre>";
        $court = 11;
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);
        $array = [];
        foreach($raw_race as $race){
            $num = 1;
            $all_line = LineTeam::select('line_name','line_team_id')
                        ->where('line_event_id','=',$event_id)
                        ->where('line_race_id','=',$race->race_id)
                        ->get()->toArray();
            $num_line = count($all_line)/2;
            foreach($all_line as $line){
                $list_team = json_decode($line['line_team_id']);
                $number_team = count($list_team);
                $first = 1;
                for($i=0; $i<$number_team; $i++){
                    for($j=$i+1; $j<$number_team; $j++){
                        if($first <= $num_line){
                            $math = $first;
                        }else{
                            $math = count($all_line)-$first+1;
                        }
                        $array[$math][] = [
                            'race' => $race->race_id,
                            'team_1' => $list_team[$i],
                            'team_2' => $list_team[$j],
                            'line_name' => $line['line_name']
                        ];
                        $num++;
                        $first++;
                    }
                }
            }
        }   
        $num = 1;
        $time = 18;
        foreach($array as $k=> $round){
            foreach($round as $key => $val){
                $data = [
                    'math_team_1' =>$val['team_1'],
                    'math_team_2' =>$val['team_2'],
                    'math_time_id' => $time,
                    'math_line_id' => $val['line_name'],
                    'math_event_id' => $event_id,
                    'math_race_id' => $val['race'],
                    'math_status' => 'NOT START',
                    'math_number' => $val['race'].$k.sprintf("%03s", $num),
                    'math_type' => 'MATH'
                ];
                Math::insert($data);
                if($num%$court == 0){
                    echo"<br>";
                    $time += 2;
                }
                $num++;
            } 
        }
    }
}


