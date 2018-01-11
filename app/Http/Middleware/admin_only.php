<?php

namespace App\Http\Middleware;

use Closure;

class admin_only
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
        if(\Auth::guest()) {
            \Session::flash('title', 'เกิดข้อผิดพลาด'); 
            \Session::flash('message', 'คุณต้องเป็นสมาชิกของเว็บไซต์เราก่อน'); 
            \Session::flash('type', 'warning'); 
            return redirect('/login?redirect='.$request->path());
        }
        if(isAdmin()) {
            return $next($request);
        }
        \Session::flash('title', 'เกิดข้อผิดพลาด'); 
        \Session::flash('message', 'คุณไม่มีสิทธิ์ใช้งานส่วนนี้'); 
        \Session::flash('type', 'error');
        return redirect()->to('/');
    }
}
