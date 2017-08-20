<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventTable;

class EventController extends Controller
{
    function index(){
        $events = EventTable::select('Event_Name', 'Event_Start', 'Event_Cover_Pic', 'Rank_Min', 'Rank_Max')
                            ->get();
        return view('index', ['events' => $events]);
    }
}
