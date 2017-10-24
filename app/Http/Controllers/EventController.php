<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Helper;
use App\Models\Rank;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamType;
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
        $covers = json_decode($event->event_cover);
        $event_description = json_decode($event->event_description);
        $ranks = Rank::get_rank_by_list(json_decode($event->event_rank));
        $event_description->date = Helper::DateThai($event_description->date);
        $number_of_team = TeamType::get_number_of_team($event->event_team_type_id);
        
        $members = Team::select('team.*','team_status_name','rank_name',DB::raw("CONCAT('[',GROUP_CONCAT(CONCAT('{ \"name\":\"', team_member_firstname,'(', team_member_nickname,')','\"}') SEPARATOR ','),']') AS member") )
                ->where("team_event_id",$event_id)
            ->join('team_member','team_id','=','team_member_team_id')
            ->join('rank','team_max_rank','=','rank_id')
            ->join('team_status','team_status','=','team_status_id')
            ->groupBy('team_id')
            ->get()
            ;
        foreach( $members as $member){
            $member->member = json_decode($member->member);
        }
        return view('front/event/index')
            ->with('covers', $covers)
            ->with('event', $event)
            ->with('event_description', $event_description)
            ->with('number_of_team', $number_of_team)
            ->with('ranks', $ranks)
            ->with('members',$members)
            ;
    }

    public static function register()
    {
        $input = Input::all();
        $team_name = $input['team_name'];
        $rank = 1;
        for ($i = 1; $i <= $input['number_of_team']; $i++) {
            if ($rank < $input['rank' . $i]) {
                $rank = $input['rank' . $i];
            }
        }
        
        $team_id = Team::create([
            "team_name" => $team_name,
            "team_event_id" => $input['event_id'],
            "team_max_rank" => $rank,
        ])->id;
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
        return redirect('event_detail/'.$input['event_id'])->with('message','ลงทะเบียนเรียบร้อย');
    }

    public static function checkTeamName(){
        $input = Input::all();
        $team = Team::where("team_name", $input['team_name'])
        ->where("team_event_id", $input['event_id'])
        ->where("team_max_rank", $input['rank'])
        ->first();
        return json_encode(["can_create"=>$team == Null]);
    }
}
