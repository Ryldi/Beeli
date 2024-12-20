<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends Controller
{
    public function get_all()
    {
        $universities = University::all();
        return view('pages.universities', compact('universities'));
    }

}
