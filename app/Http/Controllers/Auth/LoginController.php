<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
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
        $this->middleware('guest:tenderer')->except('logout');
        $this->middleware('guest:contractor')->except('logout');
    }
    /*Tenderer login*/
    public function showTendererLoginForm()
    {
        return view('auth.login', ['url' => 'tenderer']);
    }

    public function tendererLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('tenderer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function tendererLogout()
    {
        $user = Auth::guard('tenderer')->check();
        if ($user) {
            Auth::guard('tenderer')->logout();
        }
            return redirect('/tenderer/logout');
    }



    /*Contractor login*/
    public function showContractorLoginForm()
    {
        return view('auth.login', ['url' => 'contractor']);
    }

    public function contractorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('contractor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function contractorLogout()
    {
        $user = Auth::guard('contractor')->check();
        if ($user) {
            Auth::guard('contractor')->logout();
        }
            return redirect('/home');
    }



    /*Admin login*/
    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogout()
    {
        $user = Auth::guard('admin')->check();
        if ($user) {
            Auth::guard('admin')->logout();
        }
            return redirect('/home');
    }
}
