<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Models\Organizer;
use App\Models\User;
use App\Models\Event;
use App\Mail\OrgRegisterEmail;

class OrgController extends Controller
{

    public function create(Request $req) {
      return view('org/event/create');
    }

    public function save(Request $req) {
      $input = $req->input();
      $data = [];
      $date = ((int)$input['event_year'] - 543) . '-' . $input['event_month'] . '-' . $input['event_date'];
      $date_start = date_create_from_format('d/m/Y:H:i:s', $date);
      $detail = [
        'by' => $input['by'],
        'location' => [ 
          'name' => $input['map-input'],
          'position' => 'https://www.google.co.th/maps/place/' . $input['map-input']
        ],
        'date' => $date_start,
        'expenses' =>  $input['expenses_detail'] . ' บาท / คู่',
        'bookbank_organizers' =>  [
          'name' => $input['name'],
          'bank' => $input['bank'],
          'prompypay' => $input['promptpay'],
          'account' => $input['account']
        ],
        'organizers' => [ $input['organizer'] . 'ติดต่อ : ' . $input['contact'] ],
        'objective' =>  $input['objective'],
        'event_type' => [
          'type' => 'คู่ เดี่ยว', //ยังไม่มีให้เลือก
          'detail' => $input['hand'] . $input['team_num'] //แก้ front มีหลายมือ
        ],
        'detail' =>  $input['reg_duration'],
        'special_rewards' => $input['event_special'], //แก้ front มีหลายมือเกิ้น
        'rule' => $input['rule'],
        'consideration' => $input['consideration'],
        'accessory' => $input['sonbad_band'] . $input['sonbad'] . $input['sonbad_price'],
        'screening_person' => [ $input['organizer'] . 'ติดต่อ : ' . $input['contact'] ],
        'postscript' => $input['postscript']
      ];

      $data['event_start'] = $date_start;
      $data['event_title'] = $input['event_title'];
      $data['event_description'] = json_encode($detail);
      $data['event_race'] = json_encode([
        [ 'race_id' =>  $input['hand'], 'count' =>  $input['team_num'] ]
      ]);
      $data['event_cover'] = []; //เหลือทำ upload
      $data['event_package'] = 1;
      //ที่เหลือยังไม่ยู้
      //dd($data);
      $event = Event::insert($data);
      return redirect('/event/'.$event->event_id);
    }

    public function info(Request $req) {

      $org = Organizer::where('user_id', Auth::id())->first();

      if($org && $org->org_step === 3 && $req->query('edit') !== 'true')
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

    public function verify(Request $req) {
      //if ไม่มีข้อมูล go to step 1
      $org = Organizer::where('user_id', Auth::id())->first();

      if(!$org || $org->org_step === 1)
        return redirect('/org/register');
      else if($org && $org->org_step === 3 && $req->query('edit') !== 'true')
        return redirect('/org/register/step/email');
      if($org)
        return view('org/regis/verify')
            ->with('org_house_reg', ($org->org_house_reg) ? $org->org_house_reg : '')
            ->with('org_create_time', ($org->org_create_time) ? $org->org_create_time : '1')
            ->with('org_last_create', ($org->org_last_create) ? $org->org_last_create : '')
            ->with('org_id_card', ($org->org_id_card) ? $org->org_id_card : '')
            ->with('org_bank_account', ($org->org_bank_account) ? $org->org_bank_account : '');
      else
        return view('org/regis/verify')
            ->with('org_house_reg', '')
            ->with('org_create_time', '')
            ->with('org_last_create', '')
            ->with('org_id_card', '')
            ->with('org_bank_account', '');
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
          'org_last_create' => 'required'
      ]);
      $data['org_email_active'] = str_random(30);
      $data['org_step'] = 3;

      $org = Organizer::where('user_id', Auth::id());
      $user = $org->first();

      if(!$user->org_id_card || !$user->org_house_reg || !$user->org_bank_account){
        $data['org_step'] = 2;
        $org->update($data);
        return redirect()->back()->with('error', 'Upload image required.');
      }

      $org->update($data);

      return redirect('/org/register/step/email');
    }

    public function verifyEmail(Request $request, $token) {
      //param query = database verify
      $org = Organizer::where('user_id', Auth::id());
      $user = $org->first();

      if($token === $user->org_email_active) {
        User::where('id', Auth::id())->update(['user_level'=> 2 ]);
        $org->update(['org_active' => 1]);
      }

      return redirect('/org/register/step/success');
    }

    public function email() {
      $org = Organizer::where('user_id', Auth::id())->first();

      if(!$org || $org->org_step === 1)
        return redirect('/org/register');
      return view('org/regis/email');
    }

    public function success() {
      $org = Organizer::where('user_id', Auth::id())->first();
      if($org->org_active === 0)
        return redirect('/org/register/step/email');
      return view('org/regis/success');
    }

    public function getCheck() {
      $orgs = Organizer::select('org_id', 'org_firstname', 'org_lastname', 'org_nickname')
                       ->where('user_id', Auth::id())
                       ->where('org_active', 0)->get();
      
      return view('org/regis/checkAll')->with('orgs', $orgs);
    }

    public function check($org_id) {
      $org = Organizer::where('org_id', $org_id)->first();
      if($org){
        return view('org/regis/check')
          ->with('Firstname', $org->org_firstname)
          ->with('Lastname', $org->org_lastname)
          ->with('Phone', $org->org_phone)
          ->with('Email', $org->org_email)
          ->with('Nickname', $org->org_nickname)
          ->with('org_house_reg', $org->org_house_reg)
          ->with('org_create_time', $org->org_create_time)
          ->with('org_last_create', $org->org_last_create)
          ->with('org_id_card', $org->org_id_card )
          ->with('org_bank_account', $org->org_bank_account)
        ;
      }
      else {
        Session::flash('title', 'เกิดข้อผิดพลาด'); 
        Session::flash('message', 'User นี้ไม่ได้สมัคร Organizer'); 
        Session::flash('type', 'error'); 
        return redirect('/');
      }

    }

    public function checkActive(Request $req, $user_id) {
      $data = $this->validate(request(), [
          'org_active' => 'required'
      ]);
      $data['org_active'] = (int)$data['org_active'];
      
      $org = Organizer::where('user_id', $user_id);
      if($data['org_active'] === 1){
        $user = $org->first();
        $link = url('/') . '/org/register/step/verify/' . $user->org_email_active;
        \Mail::to(Auth::user()->email)->send(new OrgRegisterEmail($user->org_firstname, $user->org_lastname, $link));
      }
      $org->update($data);

      Session::flash('title', 'สำเร็จ'); 
      Session::flash('message', 'คุณได้บันทึกข้อมูลไว้แล้ว'); 
      Session::flash('type', 'success'); 
      return back();
    }
}
