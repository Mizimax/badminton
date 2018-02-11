<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ApiController extends Controller
{
    //
    public function getEvents() {
        $events = Event::select('event_id', 'event_title', 'event_cover')->get();
        if (!$events) {
            return response()->json([
                'status' => 'error',
                'message' => 'No data found.'
              ], 404);
        }

        foreach($events as $event) {
            $event->event_cover = json_decode($event->event_cover, true);
            $event->url = 'https://wezync.com/event/' . $event->event_id;
            $event->register = $event->url . '#register';
        }
        return response()->json([
            'status' => 'ok',
            'message' => 'Get events success.',
            'data' => $events
          ], 200);
    }

    public function getEvent($event_id) {
        $event = Event::select('event_id', 'event_title', 'event_cover', 'event_description')
                      ->where('event_id', $event_id)
                      ->first();
        if (!$event) {
            return response()->json([
                'status' => 'error',
                'message' => 'No data found.'
              ], 404);
        }

        $event->event_description = json_decode($event->event_description, true);
        $event->event_cover = json_decode($event->event_cover, true);
        $event->url = 'https://wezync.com/event/' . $event->event_id;
        $event->register = $event->url . '#register';
        return response()->json([
            'status' => 'ok',
            'message' => 'Get event '. $event->event_title .' success.',
            'data' => $event
          ], 200);
    }
}
