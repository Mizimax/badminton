<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Event;
use App\Models\Rank;
use App\Models\Helper;
use DateTime;

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
        $today = new DateTime();
        foreach($events as $event){
            $event->event_description = json_decode($event->event_description);
            $event->event_rank = Rank::get_rank_by_list(json_decode($event->event_rank));
            $event_date  = new DateTime($event->event_description->date);
            $dDiff = $today->diff($event_date);
            $event->day_left_text = $dDiff->format('%R%a');
            $event->day_left = $dDiff->format('%a');
            $event->event_description->date = Helper::DateThaiNotDate($event->event_description->date);
        }
        return view('home')->with('sponsors',$sponsors)->with('events',$events->toArray());
    }
}