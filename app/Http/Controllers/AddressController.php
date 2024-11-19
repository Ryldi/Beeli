<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Student;

class AddressController extends Controller
{
    public function select(Request $request)
    {
        $request->validate([
            'address_id' => 'required'
        ]);

        Address::where('student_id', session('student')->id)->where('main', 1)->update([
            'main' => 0
        ]);

        Address::where('student_id', session('student')->id)->where('id', $request->address_id)->update([
            'main' => 1
        ]);

        session(['student' => Student::with('addresses')->find(session('student')->id)]);

        return redirect()->route('checkout.view')->with('success', 'Address updated');
    }

    public function add_address(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'street' => 'required',
            'phone' => 'required',
            'province' => 'required',
            'city' => 'required',
            'subdistrict' => 'required',
            'postal_code' => 'required'
        ]);


        Address::create([
            'student_id' => session('student')->id,
            'recipient_name' => $request->name,
            'phone' => $request->phone,
            'street' => $request->street,
            'province' => $request->province,
            'city' => $request->city,
            'subdistrict' => $request->subdistrict,
            'postal_code' => $request->postal_code,
            'main' => 0
        ]);

        session(['student' => Student::with('addresses')->find(session('student')->id)]);

        return redirect()->route('checkout.view')->with('success', 'Address added');
    }
}
