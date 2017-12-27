<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Models\Organizer;

class OrgController extends Controller
{

    public function info() {

      $org = Organizer::where('user_id', Auth::id())->first();

      if($org && $org->org_step === 3)
        return redirect('/org/register/step/email');

      if($org) {
        $Firstname = $org->org_firstname;
        $Lastname = $org->org_lastname;
        $Phone = $org->org_phone;
        $Email = $org->org_email;
      }
      else {
        $name = explode(" ", Auth::user()->name);
        $Firstname = $name[0];
        $Lastname = $name[1];
        $Phone = Auth::user()->user_phone;
        $Email = Auth::user()->email;
      }

      return view('org/regis/info')
        ->with('Firstname', $Firstname)
        ->with('Lastname', $Lastname)
        ->with('Phone', $Phone)
        ->with('Email', $Email)
        ->with('Nickname', $org ? $org->org_nickname : '')
      ;
    }

    public function infoRegis(Request $req) {
      //บันทึก redirect to verify
      $data = $this->validate(request(), [
          'org_firstname' => 'required',
          'org_lastname' => 'required',
          'org_nickname' => 'required',
          'org_phone' => 'required',
          'org_email' => 'required|email'
      ]);
      $data['user_id'] = Auth::id();
      $data['org_step'] = 2;

      $org = Organizer::where('user_id', Auth::id());

      if(!$org->first())
        Organizer::create($data);
      else
        $org->update($data);

      return redirect('/org/register/step/verify');
    }

    public function verify() {
      //if ไม่มีข้อมูล go to step 1
      $org = Organizer::where('user_id', Auth::id())->first();

      if(!$org || $org->org_step === 1)
        return redirect('/org/register');
      else if($org && $org->org_step === 3)
        return redirect('/org/register/step/email');

      return view('org/regis/verify');
    }

    public function upload(Request $request) {
      //ajax อัพรูป

      try {
        $imageName = time() . '.' . 
          $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/user/', $imageName
        );
      }catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Upload failed.'], 400);
      }

      $url = url('/') . '/images/user/' . $imageName;
      $data[$request->query('name')] = $url;

      Organizer::where('user_id', Auth::id())->update($data);

      return response()->json(['status' => 'ok', 'message' => 'Upload Complete.', 'image' => $url]);
    }

    public function verifyRegis() {
      //บันทึกส่งอีเมล 
      $data = $this->validate(request(), [
          'org_create_time' => 'required',
          'org_id_card' => 'required',
          'org_house_reg' => 'required',
          'org_bank_account' => 'required',
          'org_last_create' => 'required'
      ]);

      Organizer::where('user_id', Auth::id())->update($data);

      return redirect('/org/register/step/email');
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
