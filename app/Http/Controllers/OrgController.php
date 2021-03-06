<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Models\Organizer;
use App\Models\User;
use App\Models\Event;
use App\Models\Upload;
use App\Models\Race;
use App\Models\Team;
use App\Mail\OrgRegisterEmail;

class OrgController extends Controller
{

    public function create() {
      $races = Race::select('race_id', 'race_name')
                   ->orderBy('race_event_type', 'desc')
                   ->orderBy('race_special', 'asc')
                   ->orderBy('race_id', 'asc')->get();
      return view('org/event/create')->with('races', $races);
    }

    public function edit($event_id) {
      $races = Race::select('race_id', 'race_name')
                   ->orderBy('race_event_type', 'desc')
                   ->orderBy('race_special', 'asc')
                   ->orderBy('race_id', 'asc')->get();
      $event = Event::where('event_id', $event_id)->first();
      $race = json_decode($event->event_race);
      $list_race = Event::get_list_race_from_event($event_id, $race);
      $event_cover = json_decode($event->event_cover);
      $event_description = json_decode($event->event_description);
      $event_race = json_decode($event->event_race);

      foreach($list_race as $myrace){
        $list_races[$myrace->race_id] = $myrace->race_name;
      }
      $dd = strtotime($event->event_end); 
      $dateend = [ 
        "year" => date("Y", $dd),
        "month" => (int)date("m", $dd),
        "day" => date("d", $dd), 
      ]; 

      

      return view('org/event/edit')
             ->with('event_cover', $event_cover)
             ->with('event_description', $event_description)
             ->with('event_race', $event_race)
             ->with('event', $event)
             ->with('races', $races)
             ->with('list_race', $list_races)
             ->with('dateend', $dateend);
    }

    public function save(Request $req) {
      $rules = [
          'poster' => 'required',
          'cover' => 'required|array',
          'event_title' => 'required',
          'by' => 'required',
          'map-input' => 'required',
          'event_start' => 'required|integer',
          'event_end' => 'required|integer',
          'event_year_start' => 'required|integer',
          'event_year_end' => 'required|integer',
          'event_month_start' => 'required|integer',
          'event_month_end' => 'required|integer',
          'expenses_detail' => 'required|integer',
          'hand' => 'required',
          'team_num' => 'required|array',
          'team_num.*' => 'integer',
          'reward_1' => 'required|array',
          'reward_1.*' => 'integer',
          'reward_2' => 'required|array',
          'reward_2.*' => 'integer',
          'reward_3' => 'required|array',
          'reward_3.*' => 'integer',
          'name' => 'required|array',
          'account' => 'required|array',
          'promptpay' => 'required|array',
          'bank' => 'required|array',
          'organizer' => 'required',
          'contact' => 'required',
          'objective' => 'required',
          'reg_duration' => 'required',
          'rule' => 'required',
          'consideration' => 'required',
          'postscript' => 'required',
      ];

      $customMessages = [
          'required' => 'กรุณากรอกข้อมูลให้ครบถ้วน',
          'integer' => ':attribute ต้องเป็นตัวเลขเท่านั้น'
      ];

      $this->validate($req, $rules, $customMessages);

      $input = $req->input();
      $event_id = isset($req->route()->parameters()['event_id']) ? $req->route()->parameters()['event_id']:'';
      $date = $input['event_year_start']-543 . '-' . $input['event_month_start'] . '-' . $input['event_start'];
      $dateEnd = $input['event_year_end']-543 . '-' . $input['event_month_end'] . '-' . $input['event_end'];
      $dateTime = $date . ' 00:00:00';
      $date_start = strtotime($date);
      $data = [];
      $handText = [];
      $hand = [];
      $account = [];
      $reward = [];
      $covers = [];

      /* Query */
      $handStr = Race::pluck('race_name', 'race_id');

      foreach($input['cover'] as $cover) {
        if($cover)
          $covers[] = $cover;
        else
          break;
      }

      for($i = 0; $i < count($input['hand']); $i++) {
        $hand[] = [ 'race_id' => $input['hand'][$i], 'count' => $input['team_num'][$i]];
        $handText[] = '- มือ ' . $handStr[$input['hand'][$i]] . ' รับ ' . $input['team_num'][$i] . ' ทีม กลุ่มละ 4 ทีม ( ที่1 ที่ 2 เข้ารอบน๊อคเอ้าท์)';
        $reward[] = '- มือ ' . $handStr[$input['hand'][$i]] . ' : ชนะเลิศ '. $input['reward_1'][$i] .' บาท รองชนะเลิศอันดับหนึ่ง (ที่สอง) '. $input['reward_2'][$i] .' บาท รองชนะเลิศอันดับ2 (ที่สาม) ' . $input['reward_3'][$i]. ' บาท';
      }
      for($j = 0; $j < count($input['name']); $j++) {
        $account[] = [
          'name' => $input['name'][$j],
          'bank' => $input['bank'][$j],
          'prompypay' => $input['promptpay'][$j],
          'account' => $input['account'][$j]
        ];
      }

      $detail = [
        'by' => $input['by'],
        'location' => [
          'name' => $input['map-input'],
          'position' => 'https://www.google.co.th/maps/place/' . $input['map-input']
        ],
        'date' => $date,
        'expenses' =>  $input['expenses_detail'] . ' บาท / คู่',
        'bookbank_organizers' =>  $account,
        'organizers' => [ $input['organizer'] . 'ติดต่อ : ' . $input['contact'] ],
        'objective' =>  $input['objective'],
        'event_type' => [
          'type' => 'เปิดรับสมัครลงแข่งขัน ประเภท คู่ จำกัดมือ', //ยังไม่มีให้เลือก
          'detail' => $handText //แก้ front มีหลายมือ
        ],
        'detail' =>  $input['reg_duration'],
        'reward' => [
          0 => $input['reward_1'],
          1 => $input['reward_2'],
          2 => $input['reward_3']
        ],
        'rewards' => $reward,
        'special_rewards' => $input['event_special'], //แก้ front มีหลายมือเกิ้น
        'rule' => $input['rule'],
        'consideration' => $input['consideration'],
        'accessory' => [ $input['sonbad_band'] , $input['sonbad_price'] ],
        'screening_person' => [ $input['organizer'] . ' ติดต่อ : ' . $input['contact'] ],
        'screening_person_img' => $input['hand_img'],
        'postscript' => $input['postscript']
      ];

      $data['event_start'] = $date;
      $data['event_end'] = $dateEnd;
      $data['event_title'] = $input['event_title'];
      $data['event_description'] = json_encode($detail);
      $data['event_race'] = json_encode($hand);
      $data['event_cover'] = json_encode($covers);
      $edit = \Request::segment(3);
      if(!$edit)
        $data['event_user_id'] = Auth::id();
      $data['event_poster'] = $input['poster'];
      $data['event_package'] = 1;
      $data['event_status'] = 1;

      if($event_id){
        $event = Event::where('event_id', $event_id)->update($data);
        $eventId = $event_id;
      }
      else{
        $event = Event::create($data);
        $eventId = $event->id;
      }

      return response()->json(['status' => 'ok', 'message' => 'Event saved.', 'redirect' => $eventId], 200);
    }

    public function uploadSlide(Request $request) {
      $name = $request->query('name');
      $id = Event::latest()->first();
      $slides = Upload::select('upload_path')->where('event_id', $id['event_id']+1);
      $slide = $slides->firstOrNew([
        'upload_name' => $name,
        'upload_type' => 'event_cover',
        'event_id' => $id['event_id']+1,
        'user_id' => Auth::id()
      ]);
      $slide->save();

      if($slide['upload_path']) {
        $splitName = explode("/", $slide['upload_path']);
        $fileName = $splitName[count($splitName)-1];
        $path = base_path() . '/public/images/user/' . $fileName;
        try{
          unlink($path);
        }
        catch (\Exception $e) {
        }
      }

      // try {
        $imageName = time(). '-' . uniqid(true) . '.' .
          $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(
            base_path() . '/public/images/user/', $imageName
        );
      // }catch (\Exception $e) {
      //   return response()->json(['status' => 'error', 'message' => 'Upload failed.', 'error' => $e], 400);
      // }

      $url = url('/') . '/images/user/' . $imageName;
      $data['upload_path'] = $url;

      $slides->update($data);

      return response()->json(['status' => 'ok', 'message' => 'Upload Complete.', 'image' => $url]);
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
        $Lastname = isset($name[1]) ? $name[1]: '';
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
      $name = $request->query('name');
      $org = Organizer::select($name)->where('user_id', Auth::id());
      $user = $org->first();

      if($user[$name]) {
        $splitName = explode("/", $user[$name]);
        $fileName = $splitName[count($splitName)-1];
        $path = base_path() . '/public/images/user/' . $fileName;
        try{
          unlink($path);
        }
        catch (\Exception $e) {

        }
      }

      try {

        $imageName = time(). '-' . uniqid(true) . '.' .
          $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/user/', $imageName
        );

      }catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Upload failed.'], 400);
      }

      $url = url('/') . '/images/user/' . $imageName;
      $data[$name] = $url;

      $org->update($data);

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

      $org = Organizer::where('org_id', $user_id);
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

    public function removeMember(Request $req, $event_id, $member_id) {
      Team::where('team_event_id', $event_id)->where('team_id', $member_id)->delete();
      return response()->json([
        'status' => 'ok',
        'message' => 'Member removed.'
      ], 200);
    }

    public function updateHand(Request $req, $event_id, $member_id) {
      $race = $req->json()->all()['race_id'];
      Team::where('team_event_id', $event_id)->where('team_id', $member_id)->update(array('team_race' => (int)$race));
      $result = Race::select('race_name', 'race_color')->where('race_id', $race)->first();
      return response()->json([
        'status' => 'ok',
        'message' => 'Race updated.',
        'race_id' => $result['race_name'],
        'race_color' => $result['race_color']
      ], 200);
    }

    public function updateHandStatus(Request $req, $event_id) {
      $race_id = (int)$req->json()->all()['race_id'];
      $teamCount = '';
      $max_register = '';
      $event = Event::where('event_id', $event_id);
      $event_race = json_decode($event->first()->event_race, true);
      $find = array_filter($event_race, function($var) use ($race_id) {
        return $var['race_id'] === $race_id;
      });

      if(isset($event_race[current(array_keys($find))]['status']) && $event_race[current(array_keys($find))]['status'] == 1) {
        $toggleStatus = 0;
        $teamCount = Team::where('team_event_id', $event_id)
                         ->where('team_race', $race_id)
                         ->where('team_status', '<=', '2')
                         ->count();
        $max_register = $event_race[current(array_keys($find))]['count'];
      }
      else {
        $toggleStatus = 1;
      }
      $event_race[current(array_keys($find))]['status'] = $toggleStatus;
      $event_race = json_encode($event_race);
      $event->update(['event_race' => $event_race]);

      return response()->json([
        'status' => 'ok',
        'message' => ($toggleStatus === 0) ? 'Hand opened.':'Hand closed.',
        'toggle_status' => $toggleStatus,
        'registered' => $teamCount,
        'max_register' => $max_register
      ], 200);
    }

    public function updateStatus(Request $req, $event_id, $member_id) {
      $status = $req->json()->all()['status'];
      Team::where('team_event_id', $event_id)->where('team_id', $member_id)->update(array('team_status' => (int)$status));
      return response()->json([
        'status' => 'ok',
        'message' => 'Member status updated.'
      ], 200);
    }

    public function updatePayment(Request $req, $event_id, $member_id) {
      $payment = $req->json()->all()['payment'];
      Team::where('team_event_id', $event_id)->where('team_id', $member_id)->update(array('team_payment' => (int)$payment));
      return response()->json([
        'status' => 'ok',
        'message' => 'Member payment updated.'
      ], 200);
    }

    public function raceRemove(Request $req, $event_id) {
      $race_id = (int)$req->json()->all()['race_id'];
      $event = Event::select('event_race')->where('event_id', $event_id);
      $event_race = json_decode($event->first()->event_race, true);
      $find = array_filter($event_race, function($var) use ($race_id) {
        return $var['race_id'] !== (int)$race_id;
      });
      $event_race = json_encode(array_values($find));
      $event->update(['event_race' => $event_race]);

      return response()->json([
        'status' => 'ok',
        'message' => 'Race Removed'
      ], 200);
    }

    public function updateHandCount(Request $req, $event_id, $race_id) {
      $handCount = (int)$req->json()->all()['handCount'];
      $event = Event::select('event_race')->where('event_id', $event_id);
      $event_race = json_decode($event->first()->event_race, true);
      $find = array_filter($event_race, function($var) use ($race_id) {
        return $var['race_id'] === (int)$race_id;
      });
      $event_race[current(array_keys($find))]['count'] = $handCount;
      $event_race = json_encode($event_race);
      $event->update(['event_race' => $event_race]);

      return response()->json([
        'status' => 'ok',
        'message' => 'Count updated',
        'count' => $handCount
      ], 200);
    }

    public function excel($event_id) {
      $event = Event::get_detail($event_id);
      $raw_race = json_decode($event->event_race);
      $list_race = Event::get_list_race_from_event($event_id, $raw_race);
      $columns = \DB::select("SELECT column_name FROM `information_schema`.`columns` WHERE `table_schema`=DATABASE() AND `table_name`='team_member'");
      $queryText = "";
      foreach($columns as $column) {
        if ($column !== end($columns))
          $queryText .= "CONCAT('[',GROUP_CONCAT(CONCAT('\"',`" . $column->column_name . "`,'\"')), ']') AS ".$column->column_name." ,";
        else
          $queryText .= "CONCAT('[',GROUP_CONCAT(CONCAT('\"',`" . $column->column_name . "`,'\"')), ']') AS ".$column->column_name;
      }
      $members = Team::select('team.*','team_status_name', 'race_id','race_name','race_color', 'race_event_type',\DB::raw($queryText) )
                ->where("team_event_id",$event_id)
                ->where(function($query) use ($list_race){
                    foreach($list_race as $race){
                        $query->orWhere("team_race",$race['race_id']);
                    }
                })
                ->join('team_member','team_id','=','team_member_team_id')
                ->join('race_type','team_race','=','race_id')
                ->join('team_status','team_status','=','team_status_id')
                ->groupBy('team_id')
                ->orderBy('team_payment',"DESC")
                ->orderBy('team.team_status',"ASC")
                ->get();
      $filename = 'event_'. $event_id . '_member' . ".xls";
      header('Content-type: text/csv');
      header("Content-Disposition: attachment; filename=\"$filename\"");
      echo "
          <html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">
          <html>
          <head><meta http-equiv=\"Content-type\" content=\"text/html;charset=utf-8\" /></head>
      ";
      return view('excel/member')->with('members', $members);
    }

    public function hideName($event_id) {
      $event = Event::where('event_id', $event_id);
      $event_get = $event->get();
      $data['member_status'] = $event_get[0]->member_status == 0? 1:0;
      // dd($data['member_status']);
      $event->update($data);
      return response()->json([
        'status' => 'ok',
        'message' => $data['member_status'] == 0? 'แสดงรายชื่อ':'ซ่อนรายชื่อ'
      ], 200);
    }
    public function comment(Request $req,$event_id, $member_id) {
      $data['team_comment'] = $req->json()->all()['comment'];
      Team::where('team_event_id', $event_id)->where('team_id', $member_id)->update($data);

      return response()->json([
        'status' => 'ok',
        'message' => 'Comment updated'
      ], 200);
    }
}
