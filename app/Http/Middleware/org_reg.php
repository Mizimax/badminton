<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class org_reg
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
        if(Auth::guest()) {
            Session::flash('title', 'เกิดข้อผิดพลาด'); 
            Session::flash('message', 'คุณต้องเป็นสมาชิกของเว็บไซต์เราก่อน'); 
            Session::flash('type', 'warning'); 
            return redirect('/login?redirect='.$request->path());
        }
        else if(isOrganizer()) {
            Session::flash('title', 'เกิดข้อผิดพลาด'); 
            Session::flash('message', 'คุณเป็น Organizer อยู่แล้ว'); 
            Session::flash('type', 'warning'); 
            return redirect('/');
        }
        return $next($request);
    }
}
