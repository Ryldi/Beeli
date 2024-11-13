<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index_login_personal(){
        return view('auth.login_personal');
    }

    public function index_register_personal(){
        return view('auth.register_personal');
    }



}
