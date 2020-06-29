<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function tendererLogout()
    {
        $user = Auth::guard('tenderer')->check();
        if ($user) {
            Auth::guard('tenderer')->logout();
        }
            return redirect('/');
    }


    public function contractorLogout()
    {
        $user = Auth::guard('contractor')->check();
        if ($user) {
            Auth::guard('contractor')->logout();
        }
            return redirect('/');
    }
}

