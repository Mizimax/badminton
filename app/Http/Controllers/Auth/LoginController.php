<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->back();
    }

    public function redirectLine(Request $request)
    {
        return Socialite::driver('line')->redirect();
    }

    public function callbackLine(Request $request)
    {
      $account = Socialite::with('line')->user();
      if($account && $request->has('code')){
	$email = ($account->email)? : $account->id;
        $user = User::whereEmail($email)->first();

        if (!$user) {

            $user = User::create([
                'email' => $email,
                'name' => $account->name,
                'password' => md5(rand(1,10000)),
                'user_profile' => $account->avatar
            ]);
        }
        auth()->login($user);
        return redirect()->back();
      }
      else {
        return redirect('/login');
      }
      
    }
}
