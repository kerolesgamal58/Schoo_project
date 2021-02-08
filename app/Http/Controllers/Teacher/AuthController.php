<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('teacher.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'email'
        ]);

        $credentials = $request->only(['email', 'password']);
        $remember_me = $request->remember_me == 1 ? true : false;

        if ( ! Auth::guard('teacher')->attempt($credentials, $remember_me) )
            return redirect()->back()->with(['error' => __('admin.login_failed')]);

        $request->session()->regenerate();
        return redirect()->intended('/teacher');
    }

    public function logout(Request $request){
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('teacher.get_login');
    }

    public function index(){
        return view('teacher.index');
    }
}
