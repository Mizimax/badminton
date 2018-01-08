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
        $number_of_team = TeamType::get_number_of_team($event->event_team_type_id);
        $list_rank = Rank::get()->toArray();
        $members = Team::select('team.*','team_status_name','race_name','race_color',DB::raw("CONCAT('[',GROUP_CONCAT(CONCAT('{ \"name\":\"', team_member_firstname,'(', team_member_nickname,')','\"}') SEPARATOR ','),']') AS member") )
                ->where("team_event_id",$event_id)
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

       foreach( $members as $member){
            $member->member = json_decode($member->member);
            if($member->team_status==1){
                $tmp[] = $member;
            }
            else if($member->team_status==2){
                $tmp[] = $member;
            }
            else if($member->team_status==3){
                $tmp[] = $member;
            }

            /* Check My Team */
            if($member->team_manager_id != 0 && $member->team_manager_id == Auth::id()) {
                $myTeam[] = $member;
            }
        }



        $race_id = $list_race[0]->race_id;
        $race_name = $list_race[0]->race_name;
        $matchs = Match::get_match_by_event_and_race($event_id, $race_id);

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
            foreach($result_match[$line] as $team_1 =>$a){
                ksort($result_match[$line][$team_1]);
            }
            ksort($result_match[$line]);
            ksort($team_math[$line]);
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
        return view('front/event/index')
            ->with('covers', $covers)
            ->with('event', $event)
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
            ->with('knock_match',$knock_match)
            ->with('round_knockout',$round_knockout)
            ->with('number_match_knockout',$number_match_knockout)
            ->with('round',$round)
            ->with('match_num',$match_num)
            ;
    }

    public static function modal($event_id)
    {
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);
        $list_race = Event::get_list_race_from_event($event_id, $raw_race);
        $number_of_team = TeamType::get_number_of_team($event->event_team_type_id);
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
        return redirect('event/'.$input['event_id'])->with('message','ลงทะเบียนเรียบร้อย');
    }

    public function get_math($event_id, $race_id)
    {
        $event = Event::get_detail($event_id);
        $raw_race = json_decode($event->event_race);

        $race_name = Race::where('race_id',$race_id)->first()->race_name;
        $matchs = Match::get_match_by_event_and_race($event_id, $race_id);

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
            foreach($result_match[$line] as $team_1 =>$a){
                ksort($result_match[$line][$team_1]);
            }
            ksort($result_match[$line]);
            ksort($team_math[$line]);
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
        ->with('result_match',$result_match)
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
