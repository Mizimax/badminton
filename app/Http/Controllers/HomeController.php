<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gang;
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
     public function privacypolicy()
     {


       return view('privacypolicy');

     }
    public function index()
    {
	    var_dump(DB::connection());
        $sponsors = Sponsor::getImageAll();
        $event_not_start = Event::where('event_start', '<=', \DB::raw('NOW()'))
                        ->orderBy('event_start', 'desc')
                        ->get();
        $event_started = Event::where('event_start', '>',\DB::raw('NOW()'))
                        ->orderBy('event_start', 'asc')
                        ->get();
        $events = collect($event_started)->merge($event_not_start);
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

        $nameOfDay =date("N");
        $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
        $thai_date_return="วัน".$thai_day_arr[date("w")];
      $gangs = \DB::table('gang')
        ->get();
      $newGangs = [];
      foreach($gangs as $gang) {
        if(!isset($newGangs[$gang->area]))
          $newGangs[$gang->area] = [];
        $newGangs[$gang->area][] = $gang;

      }
      // dd(strrpos($newGangs[0][1]->text, "จัน"));
        return view('home')->with('sponsors',$sponsors)
                           ->with('events',$events->toArray())
                           ->with('gangs',$newGangs)
                           ->with('dayname',$thai_date_return)
                            ->with('day',$nameOfDay);

    }
}
