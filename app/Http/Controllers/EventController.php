<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventTable;
use App\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{

    function index(){
        $events = EventTable::select('Event_Name', 'Event_key', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->get();
        return view('event.index', ['events' => $events]);
    }

    function show($name){
        $event = EventTable::select('Event_Name', 'Event_Start', 'Event_Description', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max', 'Event_Status')
                            ->where('Event_key', $name)
                            ->firstOrFail();
        return view('event.show', ['event' => $event]);
    }
    
    function getEventHandStatus($name){
        $myTeam = NULL;
        $event = \DB::Table('teams AS t')
                     ->join('personal_infos AS i', function($join)
                     {
                         $join->on('t.Player_1_id', '=',  'i.Profile_id');
                         $join->orOn('t.Player_2_id','=', 'i.Profile_id');
                     })
                     ->select('i.Firstname','i.Lastname','Team_Status','Team_Rank')
                     ->where('Team_Status', '>=', '0')
                     ->where('Event_key',$name);

        $allTeam = $event->get();

        if(Auth::check()){
            $user = $event->where('t.User_id', Auth::user()->User_id);
            $myTeam = $user->get();
        }
        
        $teams = [
            "myTeam" => ($myTeam) ? $myTeam : [],
            "allTeam" => $allTeam
        ];
        

        return response()->json([
            'action' => 'getEventHand',
            'status' => ($teams)? 'success' : 'fail',
            'message' => ($teams)? 'OK' : 'No data found',
            'data' => $teams
        ], ($teams)? 200 : 400);
    }

    function getEventPayStatus($name){
        $myTeam = NULL;
        $event = \DB::Table('teams AS t')
                     ->join('personal_infos AS i', function($join)
                     {
                         $join->on('t.Player_1_id', '=',  'i.Profile_id');
                         $join->orOn('t.Player_2_id','=', 'i.Profile_id');
                     })
                     ->select('i.Firstname','i.Lastname','Team_Status','Team_Rank')
                     ->where('Team_Status', '>=', '2')
                     ->orWhere('Team_Status', '0')
                     ->where('Event_key',$name);

        $allTeam = $event->get();

        if(Auth::check()){
            $user = $event->where('t.User_id', Auth::user()->User_id);
            $myTeam = $user->get();
        }

        $teams = [
            "myTeam" => ($myTeam) ? $myTeam : [],
            "allTeam" => $allTeam
        ];

        return response()->json([
            'action' => 'getEventHand',
            'status' => ($teams)? 'success' : 'fail',
            'message' => ($teams)? 'OK' : 'No data found',
            'data' => $teams
        ], ($teams)? 200 : 400);
    }
    
    function manage(){
        // get data to show state of event
        // get team status to show state of each team

        return view('event.manage');
    }

    function search(){
        if(!Input::get('name')){
            $event = NULL;
        }
        else{
            $word = '%' . Input::get('name') . '%';
            $event = EventTable::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
            ->where('Event_Name', 'like', $word)
            ->first();
        }
        
        return response()->json([
            'action' => 'search',
            'status' => ($event)? 'success' : 'fail',
            'message' => ($event)? 'OK' : 'No data found',
            'data' => $event
        ], ($event)? 200 : 400);
    }

    function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            'Event_Name' => 'required|string',
            'Event_key' => 'required|string',
            'Event_Start' => 'required|date',
            'Event_End' => 'required|date',
            'Rank_Min' => 'required',
            'Rank_Max' => 'required',
            'Event_Creator_id' => 'required', 
            'Event_Description' => 'required|string',
            'Event_Cover_Pic' => 'required|string',
            'Event_Image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('event/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $event = EventTable::create([
            'Event_Name' => $request['event_name'],
            'Event_key' => $request['event_key'],
            'Event_Start' => $request['event_start'],
            'Event_End' => $request['event_end'],
            'Rank_Min' => $request['rank_min'],
            'Rank_Max' => $request['rank_max'],
            'Event_Creator_Name' => $request['event_creator'], 
            'Event_Description' => $request['event_description'],
            'Event_Cover_Pic' => $request['event_cover'],
            'Event_Image' => $request['event_image'],
        ]);
        
        return redirect('event/' + $event->Event_key);
    }

    function edit($name){
        $event = EventTable::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->where('Event_key', $name)
                            ->firstOrFail();
        return view('event.edit', ['event' => $event]);
    }

    function update($name){
        //TO DO
    }

    function destroy($name){
        //TO DO
    }                                   

}
