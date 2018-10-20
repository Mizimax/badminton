<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Event;
use App\Models\Rank;
use App\Models\Helper;
use DateTime;

class DevController extends Controller
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
    public function index($event_id, $member_id)
    {

          $team = Team::select('team.team_name', 'team.team_manager', 'race_type.race_name', 'team.team_manager_phone', 'team_member.*')
              ->join('team_member', 'team.team_id', '=', 'team_member.team_member_team_id')
              ->join('race_type', 'team.team_race', '=', 'race_type.race_id')
              ->where('team_event_id', $event_id)
              ->where('team_id', $member_id)->get();
          return view('front/event/dev')
                 ->with('teams', $team);
      }

    
}
