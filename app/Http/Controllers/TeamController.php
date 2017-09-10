<?php

namespace App\Http\Controllers;

use Validator;
use App\Team;
use App\PersonalInfo;
use App\EventTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class TeamController extends Controller
{

    public function store(Request $request, $name){

        $rank = ['','A','B+','B','C+','C','P+','P','P-','S','N'];

        $validator_single = [
            'gender' => 'required|string|max:1',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'nickname' => 'required|string',
            'phone' => 'required|string|min:9|max:12',
            'rank' => 'required|integer|between:1,10',
            'age' => 'required|integer|between:1,200',
            'prize' => 'required|string'
        ];

        $validator_duo = [
            'gender_2' => 'required|string|max:1',
            'first_name_2' => 'required|string',
            'last_name_2' => 'required|string',
            'nickname_2' => 'required|string',
            'phone_2' => 'required|string|min:9|max:12',
            'age_2' => 'required|integer|between:1,200',
            'prize_2' => 'required|string'
        ];

        $validator_team = [
            'team_name' => 'required|string|unique:teams'
        ];

        $event = EventTable::select('Event_Category', 'Rank_Min', 'Rank_Max')
                            ->where('Event_key',$name)->firstOrFail();

        /* Check rank between */
        if(!($request["rank"] >= $event["Rank_Min"] && $request["rank"] <= $event["Rank_Max"])){
            $error = [ 'Rank' => 'Rank must be ' . $rank[$event["Rank_Min"]] . ' - ' . $rank[$event["Rank_Max"]] ];

            return response()->json($error, 422);
        }
        
        /* Single */
        if($event["Event_Category"] == 1){
            $validator = Validator::make($request->all(), array_merge($validator_team, $validator_single));
            if ($validator->fails()) {
                return response()->json($validator->messages(), 422);
            }
            $player_1 = PersonalInfo::create([
                'Gender' => $request['gender'],
                'Firstname' => $request['first_name'],
                'Lastname' => $request['last_name'],
                'Nickname' => $request['nickname'],
                'Tel' => $request['phone'],
                'Rank' => $request['rank'],
                'Age' => $request['age'],
                'Prize' => $request['prize'],
                'Is_Player' => true
            ]);

        }
        /* Duo */
        else if($event["Event_Category"] == 2){
            $validator = Validator::make($request->all(), array_merge($validator_team, $validator_single, $validator_duo));        
            if ($validator->fails()) {
                return response()->json($validator->messages(), 422);
            }
            $player_1 = PersonalInfo::create([
                'Gender' => $request['gender'],
                'Firstname' => $request['first_name'],
                'Lastname' => $request['last_name'],
                'Nickname' => $request['nickname'],
                'Tel' => $request['phone'],
                'Rank' => $request['rank'],
                'Age' => $request['age'],
                'Prize' => $request['prize'],
                'Is_Player' => true
            ]);

            $player_2 = PersonalInfo::create([
                'Gender' => $request['gender_2'],
                'Firstname' => $request['first_name_2'],
                'Lastname' => $request['last_name_2'],
                'Nickname' => $request['nickname_2'],
                'Tel' => $request['phone_2'],
                'Rank' => $request['rank'],
                'Age' => $request['age_2'],
                'Prize' => $request['prize_2'],
                'Is_Player' => true
            ]);
        }

        $team = Team::create([
            'Event_key' => $name,
            'User_id' => Auth::user()->User_id,
            'Player_1_id' => $player_1->Profile_id,
            'Player_2_id' => ($player_2)? $player_2->Profile_id : NULL,
            'Team_name' => $request['team_name'],
            'Team_Rank' => $request['rank']
        ]);
        
        return response()->json([
            'action' => 'Team_Register',
            'status' => 'success',
            'data' => $team
        ], 200);
    }
}
