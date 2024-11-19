<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index_login_organization(){
        return view('auth.login_organization');
    }

    public function index_register_organization(){
        return view('auth.register_organization');
    }

    public function get_all()
    {
        $organizations = Organization::all();
        return view('pages.organizations', compact('organizations'));
    }

}
