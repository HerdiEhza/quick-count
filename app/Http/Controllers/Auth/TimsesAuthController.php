<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TimsesAuthController extends Controller
{
    public function __construct()
    {
        Auth::setDefaultDriver('timses');
        config(['auth.defaults.passwords' => 'timses']);
    }

    public function login()
    {
        return view('timses_auth');
    }

    public function logoutTimses(Request $request)
    {
        Auth::guard('timses')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|min:5|max:30'
        ]);


        if (Auth::guard('timses')->attempt(['email' => $request->identifier, 'password' => $request->password])||
            Auth::guard('timses')->attempt(['username' => $request->identifier, 'password' => $request->password])) {
            // Authentication was successful...
            return redirect()->route('panel');
        } else {
            return redirect()->route('timses.login')->with('fail', 'Incorrect credentials');
        }
    }
}
