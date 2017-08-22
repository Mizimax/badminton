<?php

namespace App\Http\Controllers;

use App\Team;
use App\PersonalInfo;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    public function store(Request $request, $name){

        $validator_single = [
            'Gender' => 'required|string|max:1',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string|min:10',
            'rank' => 'required|integer|between:1,10',
            'birthday' => 'required|date'
        ];

        $validator_duo = [
            'Gender' => 'required|string|max:1',
            'first_name_2' => 'required|string',
            'last_name_2' => 'required|string',
            'phone_2' => 'required|string|min:10',
            'rank_2' => 'required|integer|between:1,10',
            'birthday_2' => 'required|date'
        ];

        $validator_team = [
            'team_name' => 'required|string'
        ];

        $event = EventTable::select('Event_id','Event_Category')
                                    ->where('Event_key',$name)->get();

        /* Single */
        if($event["category"] == 1){
            $validator = Validator::make($request->all(), array_merge($validator_team, $validator_single));
            if ($validator->fails()) {
                return response()->json($validator->messages(), 422);
            }
            $player_1 = PersonalInfo::create([
                'Gender' => $request['gender'],
                'Firstname' => $request['first_name'],
                'Lastname' => $request['last_name'],
                'Tel' => $request['phone'],
                'Rank' => $request['rank'],
                'Birthday' => $request['birthday'],
                'Is_Player' => true
            ]);

        }
        /* Duo */
        else if($event["category"] == 2){
            $validator = Validator::make($request->all(), array_merge($validator_team, $validator_single, $validator_duo));        
            if ($validator->fails()) {
                return response()->json($validator->messages(), 422);
            }
            $player_1 = PersonalInfo::create([
                'Gender' => $request['gender'],
                'Firstname' => $request['first_name'],
                'Lastname' => $request['last_name'],
                'Tel' => $request['phone'],
                'Rank' => $request['rank'],
                'Birthday' => $request['birthday'],
                'Is_Player' => true
            ]);

            $player_2 = PersonalInfo::create([
                'Gender' => $request['gender_2'],
                'Firstname' => $request['first_name_2'],
                'Lastname' => $request['last_name_2'],
                'Tel' => $request['phone_2'],
                'Rank' => $request['rank_2'],
                'Birthday' => $request['birthday'],
                'Is_Player' => true
            ]);
        }

        $team = Team::create([
            'Event_id' => $event['event_id'],
            'User_id' => Auth::id(),
            'Player_1_id' => $player_1->Profile_id,
            'Player_2_id' => ($player_2)? $player_2->Profile_id : NULL,
            'Team_name' => $request['team_name']
        ]);
        
        return response()->json([
            'action' => 'Team_Register',
            'status' => 'success',
            'data' => $team
        ], 200);
    }
}
