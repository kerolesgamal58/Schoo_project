<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function App\Helper\getCurrentStudentID;

class AuthController extends Controller
{
    public function getLogin(){
        return view('student.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'email'
        ]);

        $credentials = $request->only(['email', 'password']);
        $remember_me = $request->remember_me == 1 ? true : false;

        if ( ! Auth::guard('student')->attempt($credentials, $remember_me) )
            return redirect()->back()->with(['error' => __('admin.login_failed')]);

        $request->session()->regenerate();
        return redirect()->intended('/student');
    }

    public function logout(Request $request){
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.get_login');
    }

    public function index(){
        return view('student.index');
    }
}
