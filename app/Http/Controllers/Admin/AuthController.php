<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PayPayments;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'email'
        ]);

        $credentials = $request->only(['email', 'password']);
        $remember_me = $request->remember_me == 1 ? true : false;

        if ( ! Auth::guard('admin')->attempt($credentials, $remember_me) )
            return redirect()->back()->with(['error' => __('admin.login_failed')]);

        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.get_login');
    }

    public function index(){
//        $school_years = SchoolYear::select('id', 'fee')->get();
//        foreach ($school_years as $school_year){
//            $students = Student::select('email', 'payed', 'name', 'id')
//                ->where('school_year_id', $school_year->id)
//                ->where('payed', '<', $school_year->fee)->get();
//            foreach ($students as $student){
//                foreach ($student->parents as $parent){
//                    Mail::to($parent->email)->queue(new PayPayments($parent->name));
//                }
//            }
//        }
        return view('admin.index');
    }
}
