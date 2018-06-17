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
use App\Models\Match;
use App\Models\SetMatch;
use DB;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;

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

    public function handSort(Request $req, $event_id)
    {
        $data = $req->json()->all();
        $event = Event::select('event_race')->where('event_id', $event_id);
        $event_race = json_decode($event->first()->event_race, true);
        $data = array_unique($data);
        if(count($data) != count($event_race)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please check your sorting correctly.'
            ], 403);
        }
        $new_event_race = [];
        foreach($data as $key => $race_id){
            $find = array_filter($event_race, function($var) use ($race_id) {
                return $var['race_id'] == (int)$race_id;
            });
            $find = array_values($find);
            $new_event_race[$key] = $find[0];
        }
        $event_race = json_encode($new_event_race);
        $event->update(['event_race' => $event_race]);

        $this->split($event_id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Hand sorted'
        ], 200);
        
    }

    public function split_by_race(Request $req, $event_id, $race_id)
    {
        $data = $req->json()->all();
        $lines = LineTeam::select('line_name')
                ->where('line_event_id', $event_id)
                ->where('line_race_id', $race_id)->get();
        
        foreach($lines as $key => $line){
            LineTeam::where('line_event_id', $event_id)
                    ->where('line_race_id', $race_id)
                    ->where('line_name', $line->line_name)
                    ->update([
                        'line_team_id' => json_encode($data[$key])
                    ]);
        }
        $this->run_match($event_id);
        
    }

    public function split_by_race_shuffle($event_id, $race_id)
    {
        $lines = Team::select('team_id')
                ->where('team_event_id', $event_id)
                ->where('team_race', $race_id)->pluck('team_id')->toArray();
                
        shuffle($lines);
        
        $line = array_chunk($lines, 4);

        $result = LineTeam::where('line_event_id', $event_id)
                ->where('line_race_id', $race_id)
                ->get();
        foreach($result as $key => $res) {
            $res->where('line_id', $res->line_id)
                ->update(['line_team_id' => json_encode($line[$key])]);
        }

        $this->run_match($event_id);
    }

    public function split($event_id)
    {
        LineTeam::where('line_event_id', $event_id)->delete();
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
            ->where('team_status','=',2)
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
            // if($race_id == 30 ){
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
                    $team['line_type'] = 1;
                    LineTeam::addTeam($team);
                    $index_char++;
                }
            // }
        }
        $this->run_match($event_id);
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

    public function run_match($event_id)
    {    
        $event = Event::get_detail($event_id);
        $court = isset($event->event_court_no) && $event->event_court_no != 0 ? $event->event_court_no : 11;
        $raw_race = json_decode($event->event_race);
        $array = [];
        Match::where('match_event_id', $event_id)->delete();
        foreach($raw_race as $race){
            $num = 1;
            $all_line = LineTeam::select('line_name','line_team_id')
                        ->where('line_event_id','=',$event_id)
                        ->where('line_race_id','=',$race->race_id)
                        ->get()->toArray();
            $num_line = count($all_line);
            $newarray = [];
            foreach($all_line as $key => $line){
                $list_team = json_decode($line['line_team_id']);
                $number_team = count($list_team);
                $n = 6; // (n*(n-1))/2 default: 4 
                
                for($i = 1; $i < $number_team; $i+=2) {
                  $newarray[0][] = [
                    'race' => $race->race_id,
                    'team_1' => $list_team[$i-1],
                    'team_2' => $list_team[$i],
                    'line_name' => $line['line_name']
                  ];
                }
                for($j = 2; $j < $number_team; $j++) {
                  $newarray[1][] = [
                    'race' => $race->race_id,
                    'team_1' => $list_team[$j-2],
                    'team_2' => $list_team[$j],
                    'line_name' => $line['line_name']
                  ];
                }
                // for($k = 2; $j < $number_team; $j+=2) {
                  $newarray[2][] = [
                    'race' => $race->race_id,
                    'team_1' => $list_team[0],
                    'team_2' => $list_team[3],
                    'line_name' => $line['line_name']
                  ];
                  $newarray[2][] = [
                    'race' => $race->race_id,
                    'team_1' => $list_team[1],
                    'team_2' => $list_team[2],
                    'line_name' => $line['line_name']
                  ];
                // }


                // for($i=0; $i<$number_team; $i++){
                //     for($j=$i+1; $j<$number_team; $j++){
                //         // if($first <= $num_line){
                //         //     $match = $first;
                //         // }else{
                //         //     $match = count($all_line)-$first+1;
                //         // }
                //         $array[$race->race_id][] = [
                //             'race' => $race->race_id,
                //             'team_1' => $list_team[$i],
                //             'team_2' => $list_team[$j],
                //             'line_name' => $line['line_name']
                //         ];
                //         $num++;
                //     }
                // }
                
            
            }
            $array[$race->race_id] = array_merge($newarray[0], $newarray[1], $newarray[2]);
            
        }  
        $num = 1;
        $time = 18;
        foreach($array as $k=> $round){
            foreach($round as $key => $val){
                $data = [
                    'match_team_1' =>$val['team_1'],
                    'match_team_2' =>$val['team_2'],
                    'match_time_id' => $time,
                    'match_line_id' => $val['line_name'],
                    'match_event_id' => $event_id,
                    'match_race_id' => $val['race'],
                    'match_status' => 'NOT START',
                    'match_number' => $num,
                    'match_type' => 'MATcH'
                ];
                Match::insert($data);
                if($num%$court == 0){
                    $time += 1;
                }
                $num++;
            } 
        }
        $this->run_set_match($event_id);
    }

    public function run_set_match($event_id){
        SetMatch::where('set_match_event_id', $event_id)->delete();
        $all_match = Match::select('match_id')->where('match_event_id','=',$event_id)->where('match_type','=','MATcH')->get()->toArray();
        foreach($all_match as $match){
            SetMatch::insert(['set_match_id' => $match['match_id'], 'set_match_event_id' => $event_id]);
            SetMatch::insert(['set_match_id' => $match['match_id'], 'set_match_event_id' => $event_id]);
        }
    }

    public function run_set_knockout($event_id){
        $all_match = Match::select('match_id')->where('match_event_id','=',$event_id)->where('match_type','=','KNOCKOUT')->get()->toArray();
        foreach($all_match as $match){
            SetMatch::insert(['set_match_id' => $match['match_id']]);
            SetMatch::insert(['set_match_id' => $match['match_id']]);
            SetMatch::insert(['set_match_id' => $match['match_id']]);
        }
    }

    public function run_match_knockout($event_id){
        $court = 11;
        $num = 1;
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);
        $time = 31;
        $rank =[];
        foreach($raw_race as $race){
            $race->knockout = [];
            $all_line = LineTeam::select('line_name','line_team_id')
            ->where('line_event_id','=',$event_id)
            ->where('line_race_id','=',$race->race_id)
            ->where('line_team_id','!=','[]')
            ->get()->toArray();
            if($race->race_id==21){
                $num_team = 8;
            }else{
                $num_team = 16;
            }
            //$race->count*2/3;
            $rank[$race->race_id] = $num_team;
            foreach($all_line as $line){
                $race->knockout[] = 'ที่ 1 สาย ' . $line['line_name'];
                $race->knockout[] = 'ที่ 2 สาย ' . $line['line_name'];
            }
            for($i=count($race->knockout)+1; $i<=$num_team; $i++){
                $race->knockout[] = 'คะแนนรวมลำดับที่ ' . $i;
            }
            shuffle($race->knockout);
            $index_char = 65;
            for($i=0;$i<count($race->knockout);$i+=2){
                $data = [
                    'match_team_1_name' =>$race->knockout[$i],
                    'match_team_2_name' =>$race->knockout[$i+1],
                    'match_time_id' => $time,
                    'match_line_id' => chr($index_char),
                    'match_event_id' => $event_id,
                    'match_race_id' => $race->race_id,
                    'match_status' => 'NOT START',
                    'match_number' => $race->race_id.sprintf("%04s", $num),
                    'match_type' => 'KNOCKOUT'
                ];
                $num++;
                // if($race->race_id ==30){
                //     var_dump($data);
                    Match::insert($data);
                // }
                if($num%$court == 0){
                    $time += 1;
                }
                $index_char++;
            }
            $mod = 1;
        }
        arsort($rank);
        $max = 0;
        $race_id = [];
        $mod = [];
        foreach($rank as $k => $r){
            if($max<=$r){
                $max = $r;
            }
            $mod[$k] = 1;
        }
        
        while($max>2){
            ksort($rank);
            
            $race_id = [];
            foreach($rank as $k => $r){
                if($max<=$r){
                    $race_id[] = $k;
                    $max = $r;
                }
            }
            $max/=2;
            $tmp = $max;
            foreach($rank as $k => $r){
                
                if(in_array($k,$race_id)){
                    $index_char = 65;
                    for($i=0;$i<$max/2;$i++){
                        // echo sprintf("%04s", $num)." " .sprintf("%02s", $r)." ".$k."ผู้ชนะรอบ " . $mod[$k]. "สาย ".chr($index_char) .$time. "<br>";
                        $data = [
                            'match_team_1_name' => "ผู้ชนะรอบ " . $mod[$k],
                            'match_team_2_name' => "ผู้ชนะรอบ " . $mod[$k],
                            'match_time_id' => $time,
                            'match_line_id' => chr($index_char),
                            'match_event_id' => $event_id,
                            'match_race_id' => $k,
                            'match_status' => 'NOT START',
                            'match_number' => $k.sprintf("%04s", $num),
                            'match_type' => 'KNOCKOUT'
                        ];
                        $num++;
                        // if($k == 30){
                        //     var_dump($data);
                            Match::insert($data);
                        // }
                        
                        if($num%$court == 0){
                            $time += 1;
                            if($time > 48){
                                $time -= 48;
                            }
                        }
                        $index_char++;
                    }
                    $mod[$k]++;
                    $tmp = $r / 2;
                    $rank[$k] = $r / 2;
                    
                }
                
            }
            $max=$tmp;
        }
     $this->run_set_knockout($event_id);
    }

    public function verify(Request $req, $event_id) {
        // $data = $req->json()->all();
        // if($data){
        //     foreach($data as $race_id => $arrData){
        //         $line_team = LineTeam::where('line_event_id', $event_id)
        //                          ->where('line_race_id', $race_id);
        //         $line_team->delete();
        //         foreach($arrData as $line => $line_team_id){
        //             LineTeam::insert([
        //                 'line_event_id' => $event_id,
        //                 'line_name' => $line,
        //                 'line_team_id' => json_encode($line_team_id),
        //                 'line_race_id' => $race_id,
        //                 'line_type' => 0
        //             ]);
        //         }
        //     }
        //     $this->run_match($event_id);
        // }
        // else {
            LineTeam::where('line_event_id', $event_id)->update([ 'line_type' => 0 ]);
            $this->run_match_knockout($event_id);
        // }
    }
}