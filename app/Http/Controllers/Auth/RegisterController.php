<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tenderer;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewUser;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:tenderer');
        $this->middleware('guest:contractor');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showTendererRegisterForm()
    {
        return view('auth.register', ['url' => 'tenderer']);
    }

    public function showContractorRegisterForm()
    {
        return view('auth.register', ['url' => 'tenderer']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createAdmin(array $data)
    {
        $this->validator($request->all())->validate();
        $admin = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->intended('login/admin');
    }

    /*Create Tenderer*/
    protected function createTenderer(Request $request)
    {
        $this->validator($request->all());
        $tenderer = Tenderer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'website'=>$request->input('website')
        ]);
        $admin = User::where('admin', 1)->first();
            if ($admin) {
                $admin->notify(new NewUser($user));
            }

            return $user;
    }

    /*Create Contractor*/
    protected function createContractor(Request $request)
    {
        $this->validator($request->all())->validate();
        $contractor = Contractor::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'website'=>$request->input('website')
        ]);

        return redirect()->intended('login/contractor');
    }

}
