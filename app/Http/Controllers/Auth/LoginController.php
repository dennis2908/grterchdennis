<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
	public function showUserLoginForm()
    {
        return view('login', ['url' => 'admin']);
    }
	
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request) {
		Auth::logout();
		 if(!Auth::guard('admin')->user())
			return redirect('/login');
		else
			return redirect('/');
    }
}
