<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event_tables;
use App\User;
use App\teams;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{

    function index(){
        $events = event_tables::select('Event_Name', 'Event_key', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->get();
        return view('event.index', ['events' => $events]);

    }

    function show($name){
        $event = event_tables::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->where('Event_key', $name)
                            ->firstOrFail();
        return view('event.show', ['event' => $event]);
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
            $event = event_tables::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
            ->where('Event_Name', 'like', $word)
            ->first();
        }
        
        return response()->json($events);
    }

    function show_all_team()
    {
        $team = teams::with('User')->get();
        $User = User::with('personal_info')->get();
        return response()->json(array('team' => $team , 'User' => $User));
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

        $event = event_tables::create([
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
        $event = event_tables::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
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
