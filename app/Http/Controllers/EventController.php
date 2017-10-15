<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Helper;
class EventController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function detail($event_id)
    {
        $event = Event::get_detail($event_id);
        $covers = json_decode($event->event_cover);
        $event_description = json_decode($event->event_description);
        $event_description->date = Helper::DateThai($event_description->date);
        return view('front/event/detail')
        ->with('covers', $covers)
        ->with('event', $event)
        ->with('event_description', $event_description)
        ;
    }
}
