<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use DB;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('adminLogout');
        $this->middleware('guest:company')->except('companyLogout');
    }


    public function adminLoginForm() {

        return view('admin.login');

    } 

    public function adminLogin() {

      if(Auth::guard('admin')->attempt(['email'=>request('email'), 'password'=>request('password')])) {

        return redirect()->route('admin.home');

      }  

      return redirect()->back()->with(['error'=>'The credentials provided are invalid']);

    }

    public function adminLogout() {

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login.form');

    }

    public function companyLoginForm() {

      return view('company.login');

  } 

  public function companyLogin() {

    if(Auth::guard('company')->attempt(['email'=>request('email'), 'password'=>request('password')])) {

      return redirect()->route('company.home');

    }  

    return redirect()->back()->with(['error'=>'The credentials provided are invalid']);

  }

  public function companyLogout() {

      Auth::guard('company')->logout();

      return redirect()->route('company.login.form');

  }
    
}
