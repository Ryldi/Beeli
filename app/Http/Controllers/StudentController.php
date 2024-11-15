<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index_login_personal(){
        return view('auth.login_personal');
    }

    public function index_register_personal(){
        return view('auth.register_personal');
    }

    public function login_personal(Request $request)
    {
        $request->validate([
            'floating_email' => 'required|email',
            'floating_password' => 'required',
        ]);
        
        $student = Student::where('email', "LIKE", $request->floating_email)->first();

        if ($student && $student->password == $request->floating_password) {
            session(['student' => $student]);
            return redirect()->route('home.view')->with('success', 'Login successful');
        }

        return redirect()->route('login_personal.view')->with('error', 'Invalid email or password');
    }
}
