<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Event;
use Auth;

class my_org
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(isOrganizer()) {
            $event_id = $request->route('event_id');
            $event = Event::where('event_id', $event_id)
                ->where('event_user_id', Auth::id())
                ->first();
            if(!$event){
                \Session::flash('title', 'เกิดข้อผิดพลาด'); 
                \Session::flash('message', 'คุณไม่มีสิทธิ์ใช้งานส่วนนี้'); 
                \Session::flash('type', 'error');
                return redirect()->to('/');
            }
        }
        return $next($request);
    }
}
