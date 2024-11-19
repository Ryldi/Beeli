<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index_profile(){
        return view('pages.profile');
    }

    public function index_login_personal(){
        return view('auth.login_personal');
    }

    public function index_register_personal(){
        return view('auth.register_personal');
    }

    public function register_personal(Request $request){
        Student::create([
            'username' => $request->floating_username,
            'email' => $request->floating_email,
            'password' => $request->floating_password,
            'phone' => $request->floating_phone
        ]);

        return redirect()->route('login_personal.view')->with('success', 'Registration successful');

    }

    public function login_personal(Request $request)
    {
        $request->validate([
            'floating_email' => 'required|email',
            'floating_password' => 'required',
        ]);
        
        $student = Student::with('addresses')->where('email', "LIKE", $request->floating_email)->first();

        if ($student && $student->password == $request->floating_password) {
            session(['student' => $student]);
            return redirect()->route('home.view')->with('success', 'Login successful');
        }

        return redirect()->route('login_personal.view')->with('error', 'Invalid email or password');
    }

    public function logout_personal()
    {
        session()->forget('student');

        return redirect()->route('home.view')->with('success', 'Logout successful');
    }

    public function change_password(Request $request)
    {
        if(session('student')->password != $request->old_password){
            return redirect()->route('profile.view')->with('error', 'Old password is incorrect');
        }

        if($request->new_password != $request->confirm_password){
            return redirect()->route('profile.view')->with('error', 'Password confirmation is incorrect');
        }

        $student = Student::find(session('student')->id);
        $student->password = $request->new_password;
        $student->save();

        session(['student' => $student]);

        return redirect()->route('profile.view')->with('success', 'Password changed successfully');
    }

}
