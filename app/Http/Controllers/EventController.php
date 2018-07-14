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
use App\Models\SpecialEventMember;
use App\Models\SpecialRewards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class EventController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public static function detail($event_id)
    {
        $event = Event::get_detail($event_id);
        $event->event_end = Helper::DateThai($event->event_end);
        $covers = json_decode($event->event_cover);
        $event_description = json_decode($event->event_description);
        $raw_race = json_decode($event->event_race);
        $list_race = Event::get_list_race_from_event($event_id, $raw_race);
        $event_description->date = Helper::DateThai($event_description->date);
        $list_rank = Rank::get()->toArray();
        $members = Team::select('team.*','team_status_name', 'race_id','race_name','race_color', 'race_event_type',DB::raw("CONCAT('[',GROUP_CONCAT(CONCAT('{ \"name\":\"', team_member_firstname, ' ', team_member_lastname,'(', team_member_nickname,')','\"}') SEPARATOR ','),']') AS member") )
                ->where("team_event_id",$event_id)
                ->where(function($query) use ($list_race){
                    foreach($list_race as $race){
                        $query->orWhere("team_race",$race['race_id']);
                    }
                })
                ->join('team_member','team_id','=','team_member_team_id')
                ->join('race_type','team_race','=','race_id')
                ->join('team_status','team_status','=','team_status_id')
                ->groupBy('team_id')
                ->orderBy('team_payment',"DESC")
                ->orderBy('team.team_status',"ASC")
                ->get()
            ;
        $tmp= [];
        $myTeam = [];
        $matchza = Match::join('time', 'time.time_id', '=', 'match.match_time_id')
                      ->join('race_type', 'race_type.race_id', '=', 'match.match_race_id')
                      ->where('match.match_type', 'MATCH')
                      ->where('match.match_event_id', $event_id);
        $matchz = $matchza->get()->toArray();
        
        $countMatchRace = [];
        $prev = ['match_line_id' => ''];
        foreach($matchz as $key => $matchi) {
          $team1 = $matchi['match_team_1'];
          $team2 = $matchi['match_team_2'];
          $mems = TeamMember::get_member([$team1, $team2]);
          $i = 1;
          foreach($mems as $mem) {
            $matchz[$key]['team_'.$i.'_member_1'] = $mem[0]->name;
            $matchz[$key]['team_'.$i.'_member_2'] = $mem[1]->name;
            $i++;
          }
          if($matchi['match_line_id'] !== $prev['match_line_id']) {
            if(!isset($countMatchRace[$matchi['race_id']]))    
              $countMatchRace[$matchi['race_id']] = 1;
            else  
              $countMatchRace[$matchi['race_id']]++;
          }
          $prev = $matchi;
        }
        $groupLine = Match::select(DB::raw('COUNT(match.match_time_id) as count'))
                      ->where('match.match_event_id', $event_id)
                      ->where('match.match_type', 'MATCH')
                      ->groupBy('match.match_time_id')->get();
        $number_of_team = [];
        foreach($list_race as $race) {
            $number_of_team[] = Race::where('race_id', $race->race_id)->first()->race_event_type;
        }
       foreach( $members as $member){
            $member->member = json_decode($member->member);
            /* Check My Team */
            if($member->team_manager_id != 0 && $member->team_manager_id == Auth::id()) {
                $myTeam[] = $member;
            }
            else if($member->team_status >= 1 && $member->team_status<=3){
                $tmp[] = $member;
            }
        }

        
        $race_id = $list_race[0]->race_id;
        $race_name = $list_race[0]->race_name;
        $matchs = Match::get_match_by_event_and_race($event_id, $race_id);
        $line_team = LineTeam::where('line_event_id', $event_id)->get();
        if(count($line_team) === 0)
          $line_type = null;
        else
          $line_type = $line_team[0]->line_type;
        $group_3 = [];
        foreach($line_team as $line) {
          if(count(json_decode($line->line_team_id)) === 3) 
            $group_3[$line->line_race_id][$line->line_name] = true;
        }
        $result_match = [];
        $team_math = [];
        $score_team = [];
        foreach($matchs as $line => $match){
            $teams = json_decode(LineTeam::get_team_list($event_id, $race_id,$line)->line_team_id);
        
            $team_math[$line] = TeamMember::get_member($teams);
            $score_team[$line] = Match::get_score($teams);
            $result_match[$line] = [];
            for($i = 0; $i < count($teams); $i++) 
              for($j = 0; $j < count($teams); $j++)
                $result_match[$line][$teams[$i]][$teams[$j]] = [];

            foreach($match as $im => $m){
                $score = [
                    'set_score_team_1' => $m['set_score_team_1'],
                    'set_score_team_2' => $m['set_score_team_2'],
                    'set_team_win' => $m['set_team_win']
                ];
                // if(!isset($result_match[$line][$m['match_team_1']][$m['match_team_1']])){
                //     $result_match[$line][$m['match_team_1']][$m['match_team_1']] = [];
                // }
                // if(!isset($result_match[$line][$m['match_team_2']][$m['match_team_2']])){
                //     $result_match[$line][$m['match_team_2']][$m['match_team_2']] = [];
                // }
                // if(!isset($result_match[$line][$m['match_team_1']][$m['match_team_2']])){
                    unset($m['set_score_team_1']);
                    unset($m['set_score_team_2']);
                    unset($m['set_team_win']);
                    unset($m['set_id']);
                    $result_match[$line][$m['match_team_1']][$m['match_team_2']] = $m;
                    $result_match[$line][$m['match_team_2']][$m['match_team_1']] = $m;

                // }
                $result_match[$line][$m['match_team_1']][$m['match_team_2']]['score'][]=$score;
                $result_match[$line][$m['match_team_2']][$m['match_team_1']]['score'][]=$score;
            }

            
            $i = 0;
            // foreach($result_match[$line] as $team_1 =>$a){
            //     $keys = array_keys($result_match[$line][$team_1]);
            //     for($j = 1; $j <= $i; $j++){
            //         $newArray = array_swap_assoc($team_1, $keys[$j], $result_match[$line][$team_1]);
            //         $result_match[$line][$team_1] = $newArray;
            //     }  
            //     $i++;
            // }

        }
        
        $color_team = [];
        $all_team = [];
        foreach($team_math as $line_name => $line){
            $i=0;
            $color_circle = ['ed3833','fcef4f','42abe2','c7b299'];
            foreach($line as $team => $member){
                $color_team[$line_name][$team] = $color_circle[$i];
                $all_team[$team] = $member;
                $i++;
            }
        }
        // --- KNOCK OUT
        $knock = Match::get_knockout_by_event_and_race($event_id, $race_id);
        $round_knockout = [];
        $number_match_knockout = [];
        if($race_id == 21){
            $max = 8;
        }else{
            $max = 16;
        }
        // $max = count($knock)/3;
        while($max>4){
            $round_knockout[] = "รอบ " .$max ." ทีม";
            $number_match_knockout[] = $max/2;
            $max /=2;
        }
        $round_knockout[] = "รอบรองชนะเลิศ";
        $number_match_knockout[] = $max/2;
        $round_knockout[] = "รอบชิงชนะเลิศ";
        $number_match_knockout[] = $max/4;

        $knock_match = [];
        
        foreach($knock as $match){
                $score = [
                    'set_score_team_1' => $match['set_score_team_1'],
                    'set_score_team_2' => $match['set_score_team_2'],
                    'set_team_win' => $match['set_team_win']
                ];
                if(!isset($knock_match[$match['match_id']])){
                    unset($match['set_score_team_1']);
                    unset($match['set_score_team_2']);
                    unset($match['set_team_win']);
                    unset($match['set_id']);
                    $knock_match[$match['match_id']] = $match;
                }
                $knock_match[$match['match_id']]['score'][]=$score;
        }
        ksort($knock_match);
        $round = [];
        $i = 0;
        $match_num = 0;
        $prev = 0;
        while(isset($number_match_knockout[$i+1])) {
            $round[$i] = array_slice($knock_match, $prev + $number_match_knockout[$i], $number_match_knockout[$i+1]);
            $prev += $number_match_knockout[$i];
            $i++;
        }
        $event_image = json_decode($event->event_image);
        return view('front/event/index')
            ->with('covers', $covers)
            ->with('event', $event)
            ->with('event_image', $event_image)
            ->with('event_description', $event_description)
            ->with('number_of_team', $number_of_team)
            ->with('list_race', $list_race)
            ->with('members',$tmp)
            ->with('my_team', $myTeam)
            ->with('all_team',$all_team)
            ->with('list_rank',$list_rank)
            ->with('result_match',$result_match)
            ->with('team_math',$team_math)
            ->with('score_team',$score_team)
            ->with('color_team',$color_team)
            ->with('race_name',$race_name)
            ->with('race_id', $race_id)
            ->with('knock_match',$knock_match)
            ->with('round_knockout',$round_knockout)
            ->with('number_match_knockout',$number_match_knockout)
            ->with('round',$round)
            ->with('match_num',$match_num)
            ->with('event_id', $event_id)
            ->with('line_type', $line_type)
            ->with('matchs', $matchz)
            ->with('groupLine', $groupLine)
            ->with('group_3', $group_3)
            ->with('countMatchRace', $countMatchRace)
            ;
    }

    public static function modal($event_id)
    {
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);
        $list_race = Event::get_list_race_from_event($event_id, $raw_race);
        $number_of_team = [];
        foreach($list_race as $race) {
            $number_of_team[] = Race::where('race_id', $race->race_id)->first()->race_event_type;
        }
        $list_rank = Rank::get()->toArray();

        return view('front/event/support_home')
            ->with('event', $event)
            ->with('number_of_team', $number_of_team)
            ->with('list_race', $list_race)
            ->with('list_rank',$list_rank)
            ;
    }

    public static function register()
    {
        $input = Input::all();
        $team_name = $input['team_name'];
        $race = $input['race'];
        $event = Event::get_detail($input['event_id']);
        $raw_race = json_decode($event->event_race);
        $list_race = Event::get_list_race_from_event($input['event_id'], $raw_race);
        foreach($list_race as $races) 
            if($races->race_id === (int)$race && $races->status === 1)
                return redirect()->back()->with('message', 'มือ ' . $races->race_name . ' ปิดรับสมัครแล้ว')
                                         ->with('type', 'error');

        $team_id = Team::create([
            "team_name" => $team_name,
            "team_event_id" => $input['event_id'],
            "team_race" => $race,
            "team_manager" => $input['team_manager'],
            "team_manager_id" => $input['team_manager_id'],
            "team_manager_phone" => $input['team_phone'],
        ])->id;

        if (Auth::guest()){

        }else{
            if(Auth::user()->user_phone == null){
                $user = Auth::user();
                $user->user_phone = $input['team_phone'];
                $user->save();
            }
        }
        for ($i = 1; $i <= $input['number_of_team']; $i++) {
            $filename = "";
            if (isset($input['pic' . $i])) {
                $image = Input::file('pic' . $i);
                $filename = $team_id . "_" . $i . '.' . $image->getClientOriginalExtension();
                $path = 'images/events/' . $input["event_id"] . '/member/';
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $filename = $path . $filename;
                $full_path = public_path($filename);
                Image::make($image->getRealPath())->resize(300, 300)->save($full_path);
            }
            $data = [];
            $data['team_member_firstname'] = $input['first_name' . $i];
            $data['team_member_lastname'] = $input['last_name' . $i];
            $data['team_member_nickname'] = $input['nickname' . $i];
            $data['team_member_gender'] = $input['gender' . $i];
            $data['team_member_age'] = $input['age' . $i];
            $data['team_member_phone'] = $input['phone' . $i];
            $data['team_member_prize'] = $input['prize' . $i];
            $data['team_member_pic'] = $filename;
            $data['team_member_rank'] = $input['rank' . $i];
            $data['team_member_event_id'] = $input['event_id'];
            $data['team_member_team_id'] = $team_id;
            TeamMember::insert($data);
        }
        return redirect('event/'.$input['event_id'].'#/member')->with('message','ลงทะเบียนเรียบร้อย');
    }

    public function getMember($event_id, $member_id) {
        $team = Team::select('team.team_name', 'team.team_manager', 'race_type.race_name', 'team.team_manager_phone', 'team_member.*')
            ->join('team_member', 'team.team_id', '=', 'team_member.team_member_team_id')
            ->join('race_type', 'team.team_race', '=', 'race_type.race_id')
            ->where('team_event_id', $event_id)
            ->where('team_id', $member_id)->get();
        return view('front/event/modal_desc')
               ->with('teams', $team);
    }

    public function getAll ($event_id) {
      $event = Event::get_detail($event_id);
      $raw_race = json_decode($event->event_race);
      $list_race = Event::get_list_race_from_event($event_id, $raw_race);
      $matchza = Match::join('time', 'time.time_id', '=', 'match.match_time_id')
                      ->join('race_type', 'race_type.race_id', '=', 'match.match_race_id')
                      ->where('match.match_type', 'MATCH')
                      ->where('match.match_event_id', $event_id);
      $matchz = $matchza->get()->toArray();
      
      $countMatchRace = [];
      $prev = ['match_line_id' => ''];
      foreach($matchz as $key => $matchi) {
        $team1 = $matchi['match_team_1'];
        $team2 = $matchi['match_team_2'];
        $mems = TeamMember::get_member([$team1, $team2]);
        $i = 1;
        foreach($mems as $mem) {
          $matchz[$key]['team_'.$i.'_member_1'] = $mem[0]->name;
          $matchz[$key]['team_'.$i.'_member_2'] = $mem[1]->name;
          $i++;
        }
        if($matchi['match_line_id'] !== $prev['match_line_id']) {
          if(!isset($countMatchRace[$matchi['race_id']]))    
            $countMatchRace[$matchi['race_id']] = 1;
          else  
            $countMatchRace[$matchi['race_id']]++;
        }
        $prev = $matchi;
      }
      $line_team = LineTeam::where('line_event_id', $event_id)->get();
      $group_3 = [];
      foreach($line_team as $line) {
        if(count(json_decode($line->line_team_id)) === 3) 
          $group_3[$line->line_race_id][$line->line_name] = true;
      }
      $groupLine = Match::select(DB::raw('COUNT(match.match_time_id) as count'))
                    ->where('match.match_event_id', $event_id)
                    ->where('match.match_type', 'MATCH')
                    ->groupBy('match.match_time_id')->get();
      return view('front/event/all')
              ->with('event', $event)
              ->with('list_race', $list_race)
              ->with('matchs', $matchz)
              ->with('groupLine', $groupLine)
              ->with('group_3', $group_3)
              ->with('countMatchRace', $countMatchRace)
              ;
    }

    public function getMatchAll(Request $req, $event_id)
    {
      $data = $req->json()->all();
      $tempNo = 100000;
      $diffCount = count($data['to']) - count($data['from']);
      $diff = $data['to'][0] - $data['from'][0];
      $time_to = $data['time_to'];
      $time_from = $data['time_from'];
      $tempArr = [];

      Match::whereIn('match_number',array_merge($data['from'], $data['to']))->increment('match_id', $tempNo);
      Match::where('match_number', '>', $data['from'][count($data['from'])-1])->where('match_number', '<', $data['to'][0])->orderBy('match_id', $diffCount < 0 ? 'asc': 'desc')->increment('match_id', $diffCount);
      Match::whereIn('match_number',$data['from'])->update(['match_time_id' => $time_to]);
      Match::whereIn('match_number',$data['to'])->update(['match_time_id' => $time_from]);
      Match::whereIn('match_number',$data['from'])->decrement('match_id', $tempNo-$diff-$diffCount);
      Match::whereIn('match_number',$data['to'])->decrement('match_id', $tempNo+$diff);   
      Match::whereIn('match_number',$data['to'])->increment('match_number', $tempNo);        
      Match::whereIn('match_number',$data['from'])->increment('match_number', $diff+$diffCount);
      for($i=0; $i < count($data['to']); $i++)
        array_push($tempArr, $tempNo+$data['to'][$i]); 
      Match::whereIn('match_number',$tempArr)->decrement('match_number', $tempNo+$diff);      
      
      Match::where('match_number', '>', $data['from'][count($data['from'])-1])->where('match_number', '<', $data['to'][0])->increment('match_number', $diffCount);
      
      if($diffCount < 0) {
        $match = Match::where('match_number', $data['to'][0])->pluck('match_id');
        $matchUse = $match[0]-count($data['from'])+1;
        for($i = $matchUse; $i < $matchUse-$diffCount; $i++) {
          var_dump($i);
          Match::where('match_id', $i)->increment('match_number', 1);
        }
      }
      else if($diffCount > 0) {
        $match = Match::where('match_number', $data['from'][0])->pluck('match_id');
        $matchUse = $match[0]+count($data['to'])-1;
        for($i = $matchUse; $i > $matchUse-$diffCount; $i--) {
          Match::where('match_id', $i)->decrement('match_number', 1);
        }
      }

    }

    public function get_math($event_id, $race_id)
    {
        
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);

        $race_name = Race::where('race_id',$race_id)->first()->race_name;
        $matchs = Match::get_match_by_event_and_race($event_id, $race_id);
        $line_type = LineTeam::select('line_type')->where('line_event_id', $event_id)->first()['line_type'];

        $result_match = [];
        $team_math = [];
        $score_team = [];
        foreach($matchs as $line => $match){
            $teams = json_decode(LineTeam::get_team_list($event_id, $race_id,$line)->line_team_id);
            $team_math[$line] = TeamMember::get_member($teams);
            $score_team[$line] = Match::get_score($teams);
            $result_match[$line] = [];
            foreach($match as $m){
                $score = [
                    'set_score_team_1' => $m['set_score_team_1'],
                    'set_score_team_2' => $m['set_score_team_2'],
                    'set_team_win' => $m['set_team_win']
                ];
                if(!isset($result_match[$line][$m['match_team_1']][$m['match_team_1']])){
                    $result_match[$line][$m['match_team_1']][$m['match_team_1']] = [];
                }
                if(!isset($result_match[$line][$m['match_team_2']][$m['match_team_2']])){
                    $result_match[$line][$m['match_team_2']][$m['match_team_2']] = [];
                }
                if(!isset($result_match[$line][$m['match_team_1']][$m['match_team_2']])){
                    unset($m['set_score_team_1']);
                    unset($m['set_score_team_2']);
                    unset($m['set_team_win']);
                    unset($m['set_id']);
                    $result_match[$line][$m['match_team_1']][$m['match_team_2']] = $m;
                    $result_match[$line][$m['match_team_2']][$m['match_team_1']] = $m;

                }
                $result_match[$line][$m['match_team_1']][$m['match_team_2']]['score'][]=$score;
                $result_match[$line][$m['match_team_2']][$m['match_team_1']]['score'][]=$score;
            }
            $i = 0;
            foreach($result_match[$line] as $team_1 =>$a){
                $keys = array_keys($result_match[$line][$team_1]);
                for($j = 1; $j <= $i; $j++){
                    $newArray = array_swap_assoc($team_1, $keys[$j], $result_match[$line][$team_1]);
                    $result_match[$line][$team_1] = $newArray;
                }  
                $i++;
            }
        }
        $color_team = [];
        foreach($team_math as $line_name => $line){
            $i=0;
            $color_circle = ['ed3833','fcef4f','42abe2','c7b299'];
            foreach($line as $team => $member){
                $color_team[$line_name][$team] = $color_circle[$i];
                $i++;
            }
        }
        
        return view('front/event/match_table')
        ->with('event', $event)
        ->with('race_id', $race_id)
        ->with('result_match',$result_match)
        ->with('line_type', $line_type)
        ->with('team_math',$team_math)
        ->with('score_team',$score_team)
        ->with('color_team',$color_team)
        ->with('race_name',$race_name);
    }

    public function get_knockout($event_id, $race_id)
    {
        $matchs = Match::get_match_by_event_and_race($event_id, $race_id);
        foreach($matchs as $line => $match){
            $teams = json_decode(LineTeam::get_team_list($event_id, $race_id,$line)->line_team_id);
            $team_math[$line] = TeamMember::get_member($teams);
        }
        foreach($team_math as $line_name => $line){
            foreach($line as $team => $member){
                $all_team[$team] = $member;
            }
        }
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);
        $list_race = Event::get_list_race_from_event($event_id, $raw_race);
        $knock = Match::get_knockout_by_event_and_race($event_id, $race_id);
        $round_knockout = [];
        $number_match_knockout = [];
        foreach($list_race as $race){
            // if($race->race_id ==$race_id){
            //     if
            //     $max = $race->max_register * 2 /3;
            // }
            if($race_id == 21){
                $max = 8;
            }else{
                $max = 16;
            }
        }

        while($max>4){
            $round_knockout[] = "รอบ " .$max ." ทีม";
            $number_match_knockout[] = $max/2;
            $max /=2;
        }
        $round_knockout[] = "รอบรองชนะเลิศ";
        $number_match_knockout[] = $max/2;
        $round_knockout[] = "รอบชิงชนะเลิศ";
        $number_match_knockout[] = $max/4;

        $knock_match = [];

        foreach($knock as $match){
                $score = [
                    'set_score_team_1' => $match['set_score_team_1'],
                    'set_score_team_2' => $match['set_score_team_2'],
                    'set_team_win' => $match['set_team_win']
                ];
                if(!isset($knock_match[$match['match_id']])){
                    unset($match['set_score_team_1']);
                    unset($match['set_score_team_2']);
                    unset($match['set_team_win']);
                    unset($match['set_id']);
                    $knock_match[$match['match_id']] = $match;
                }
                $knock_match[$match['match_id']]['score'][]=$score;
        }
        ksort($knock_match);
        $round = [];
        $i = 0;
        $match_num = 0;
        $prev = 0;
        while(isset($number_match_knockout[$i+1])) {
            $round[$i] = array_slice($knock_match, $prev + $number_match_knockout[$i], $number_match_knockout[$i+1]);
            $prev += $number_match_knockout[$i];
            $i++;
        }
        return view('front/event/knockout_table')
            ->with('knock_match',$knock_match)
            ->with('all_team',$all_team)
            ->with('round_knockout',$round_knockout)
            ->with('number_match_knockout',$number_match_knockout)
            ->with('match_num', $match_num)
            ->with('round', $round)
            ;
    }

    public function register_special_event($event_id){
        if($event_id != 1 || Auth::guest()){
            return redirect()->to('/');

        }

        $user_id = Auth::user()->id;
        $data = [
            "special_event_member_user_id" => $user_id,
            "special_event_member_event_id" => $event_id,
            "special_event_member_special_event_id" => $event_id
        ];
        $user = SpecialEventMember::where("special_event_member_user_id",$user_id)
        ->where("special_event_member_special_event_id",$event_id)->first();
	if($user){
            return redirect('event/'.$event_id)->with('message','ท่านเคยลงทะเบียนรายการนี้แล้ว');
        }
        SpecialEventMember::register($data);
        return redirect('event/'.$event_id)->with('message','ลงทะเบียนเรียบร้อย');
    }

    public function prize($event_id){
        $rewards = SpecialRewards::where("special_rewards_evend_id", $event_id)->get();
        return view('front/event/prize')
            ->with('rewards',$rewards);
    }

    public function get_member_special_rewards($event_id)
    {
        return SpecialEventMember::select('special_event_member_id','name','user_profile')
        ->join('users','id','=','special_event_member_user_id')
        ->where('special_event_member_special_event_id',$event_id)->get();
    }
}
