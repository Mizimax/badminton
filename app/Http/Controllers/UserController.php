<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\Models\Event;
use App\Models\Rank;
use App\Models\User;
use App\Models\Helper;
use DateTime;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
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
    public function register()
    {
        $input = Input::all();
        $email = $input['email'];
        $user = User::where('email','=',$email)->first();
        if($user){
            return back()->with('error', 'Your Email has exist.');
        }
        $data = [
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'name' => $input['first_name'] . ' ' .$input['last_name'],
            'user_phone' => $input['phone'],
            'user_profile' => '/images/no_pic.jpg',
            'user_coin' => 200,
            'user_level' => 1,
        ];
        User::insert($data);
        $user = User::where('email','=',$email)->first();
        auth()->login($user);
        return redirect()->to('/');
    }

    public function login()
    {
        $input = Input::all();
        $email = $input['email'];
        $user = User::where('email','=',$email)->first();
        if($user){
            if(password_verify($input['password'], $user->password)){
                auth()->login($user);
                return redirect()->to('/');
            }
        }
        return back()->with('error', 'Your Email or Password is wrong.');
    }
}