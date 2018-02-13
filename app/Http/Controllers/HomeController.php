<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Event;
use App\Models\Rank;
use App\Models\Race;
use App\Models\TeamType;
use App\Models\Helper;
use DateTime;
use DateTimeZone;

class HomeController extends Controller
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
    public function index()
    {
        $sponsors = Sponsor::getImageAll();
        $events = Event::get();
        $today = new DateTime('NOW', new DateTimeZone('Asia/Bangkok'));
        foreach($events as $event){
            $event->event_description = json_decode($event->event_description);
            $raw_race = json_decode($event->event_race);
            $event->event_race = Event::get_list_race_from_event($event->event_id, $raw_race);
            $event_date  = new DateTime($event->event_description->date);
            $dDiff = $today->diff($event_date);
            $event->day_left_text = $dDiff->format('%R%a');
            $event->day_left = $dDiff->format('%a');
            $event->event_description->date = Helper::DateThaiNotDate($event->event_description->date);
        }
        return view('home')
                           ->with('sponsors',$sponsors)
                           ->with('events',$events->toArray());
    }
}
