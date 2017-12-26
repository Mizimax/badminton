<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class OrgController extends Controller
{

    public function createPage() {
      return view('org/event/create');
    }

    public function info() {
      if(Auth::guest()) {
        Session::flash('title', 'เกิดข้อผิดพลาด'); 
        Session::flash('message', 'คุณต้องเป็นสมาชิกของเว็บไซต์เราก่อน'); 
        Session::flash('type', 'warning'); 
        return redirect('/login?redirect=/org/register');
      }
      else if(Auth::isOrganizer()) {
        Session::flash('title', 'เกิดข้อผิดพลาด'); 
        Session::flash('message', 'คุณเป็น Organizer อยู่แล้ว'); 
        Session::flash('type', 'warning'); 
        return redirect('/');
      }

      return view('org/regis/info')
        ->with('Firstname', Auth::user()->Firstname)
        ->with('Lastname', Auth::user()->Lastname)
      ;
    }

    public function infoRegis() {
      //บันทึก redirect to verify
      return view('org/regis/info');
    }

    public function verify() {
      //if ไม่มีข้อมูล go to step 1
      //upload รูป ajax
      return view('org/regis/verify');
    }

    public function upload() {
      //ajax อัพรูป
    }

    public function verifyRegis() {
      //บันทึกส่งอีเมล 
      return view('org/regis/info');
    }

    public function verifyEmail() {
      //param query = database verify
      return view('org/regis/info');
    }

    public function email() {
      return view('org/regis/email');
    }

    public function success() {
      return view('org/regis/success');
    }
}
