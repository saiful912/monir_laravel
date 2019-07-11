<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

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

//    public function login(Request $request)
//    {
//        $this->validate($request,[
//            'email'=>'required|email',
//            'password'=>'required',
//        ]);
////find User by this email
//        $user=User::where('email',$request->email)->first();
//        if ($user->status ==1){
//            //login this user
//            if (Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember_token)){
//                //log him now
//                return redirect()->intended(route('index'));
//            }
//        }else{
//            //send him a token again
//            if (!is_null($user)){
//                $user->notify(new VerifyRegistration($user));
//                session()->flash('success', 'A new confirmation email has sent to yoy..Please check and verify');
//                return back();
//            }else{
//                session()->flash('errors','Please login first||');
//                return redirect()->route('login');
//            }
//        }
//    }
}
