<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrgController extends Controller
{

    public function createPage() {
      return view('org/event/create');
    }

    public function info() {
      //if already ไปหน้าแก้ไขข้อมูล
      return view('org/regis/info');
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
