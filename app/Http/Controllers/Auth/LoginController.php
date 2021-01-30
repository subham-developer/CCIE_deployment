<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

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

    public function redirectTo()
    {
    //  $data =   \Mail::to('shubhamlal059@gmail.com')->send("Hieeee");


    // Sending Mail using below Code
        
    // $data = Mail::to("shubhamlal059@gmail.com")->send(new NewContact());
    //  dd($data);
        // dd(session()->get('previousUrl'));
        // str_replace(search, replace, subject)
        // dd(str_replace(url('/'), '', session()->get('previousUrl','/')));
        // User role
        // if(Cart::count() == 0)
        // {
            $role = Auth::user()->role_id; 
            // dd($role);
            // Check user role
            switch ($role) {
                case 1:
                        // $contact = 9004728301;
                        // $otpSend = User::sendOtpSmsData($contact);
                        // dd($otpSend);
                        return '/Dashboard';
                    break;
                case 2:
                    // $contact = 9004728301;
                    // $otpSend = User::sendOtpSmsData($contact);
                    // dd($otpSend);
                    return '/Home';
                    break;
                }
        }
        // else 
        // {
        //     return str_replace(url('/'), '', session()->get('previousUrl','/'));
        // }
        // return redirect('/');
    // }
}
