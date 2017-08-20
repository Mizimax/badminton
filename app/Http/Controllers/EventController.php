<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventTable;

class EventController extends Controller
{

    function index(){
        $events = EventTable::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->get();
        return view('home', ['events' => $events]);
    }

    function show($id){
        $event = EventTable::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->where('Event_id', $id)
                            ->first();
        return view('home', ['event' => $event]);
    }

    function create(){
        return view('event/create');
    }

    function store(Request $request){
        
        Validator::make($request->all(),[
            'Event_Name' => 'required|string',
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
            'Event_Start' => $request['event_start'],
            'Event_End' => $request['event_end'],
            'Rank_Min' => $request['rank_min'],
            'Rank_Max' => $request['rank_max'],
            'Event_Creator_Name' => $request['event_creator'], 
            'Event_Description' => $request['event_description'],
            'Event_Cover_Pic' => $request['event_cover'],
            'Event_Image' => $request['event_image'],
        ]);
        
        return redirect('event/' + $event->Event_id);
    }

    function edit($id){
        $event = EventTable::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->where('Event_id', $id)
                            ->first();
        return view('eventEdit', ['event' => $event]);
    }

    function update($id){
        //TO DO
    }

    function destroy($id){
        //TO DO
    }

}
