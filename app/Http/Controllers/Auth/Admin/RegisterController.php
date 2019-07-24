<?php

namespace App\Http\Controllers\Auth\Admin;


use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


//use Illuminate\Foundation\Auth\RegistersUsers in coming this class for foreign key defined register form
    public function showRegistrationForm()
    {
        //foreign key
        $divisions = Division::orderBy('priority', 'asc')->get();
        $districts = District::orderBy('name', 'asc')->get();
        return view('auth.register', compact('divisions', 'districts'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['nullable', 'string', 'max:30'],
            'username' => ['string', 'max:30', 'unique:users'],
            'phone_no' => ['required', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:128', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'street_address' => ['required', 'max:128'],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => str_slug($request->first_name . $request->last_name),
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'street_address' => $request->street_address,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'ip_address' => request()->ip(),
            'password' => Hash::make($request->password),
            'remember_token' => str_random(50),
            'status' => 0,
        ]);
//notification
//        $user->notify(new VerifyRegistration($user));

        session()->flash('success', 'A confirmation email has sent to yoy..Please check and verify');
        return back();

    }
}
