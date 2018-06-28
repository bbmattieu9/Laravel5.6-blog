<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request ;
use Session;


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
     protected $redirectTo = '/';

   //  protected function authenticated(Request $request, $user)
   // {
   //     return redirect('/');
   // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('getLogout');
    }


    public function getLogin()
    {
      return view('auth.login');
    }

    public function getLogout()
    {
        \Auth::logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
                'email'    => 'required',
                'password' => 'required',
            ]);

        //Store Email field Value
        $loginValue = $request->input('email');

        //Get Login Type
        $login_type = $this->getLoginType($loginValue);

        //Change request type based on user input
        $request->merge([
            $login_type => $loginValue
        ]);

        //Check Credentials and redirect
        if (\Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->intended($this->redirectPath());
        }
        return redirect()->back()->withInput()->withErrors([ 'email' => "These credentials do not match our records." ]);
    }

    public function getLoginType($loginValue) {
       return filter_var($loginValue, FILTER_VALIDATE_EMAIL ) ? 'email'
           : ( (preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $loginValue)) ? 'mobile' : 'username' );
   }


}
