@extends('layouts.auth_master')

@section('content')
<div class="container flex flex-col mt-20 max-w-lg border border-dark p-10 rounded-md">
    <div class="">
        <span class="text-accent text-4xl font-pattaya hover:text-accent-hover transition-all duration-500">Beeli </span>
        <span class="text-accent text-4xl font-poppins font-medium hover:text-accent-hover transition-all duration-500">account</span>
    </div>
    <div class="">
        <span class="text-2xl font-poppins font-medium">Sign Up your personal account</span>
    </div>
    <form class="pt-8" method="POST" action="{{ route('register_personal.post') }}">
        @csrf
        @method('POST')
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-accent focus:outline-none focus:ring-0 focus:border-accent peer" placeholder=" " required />
            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-accent duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-accent peer-focus:dark:text-accent peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
        </div>
        <div class="relative z-0 w-full mb-5 group mt-5">
            <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-accent focus:outline-none focus:ring-0 focus:border-accent peer" placeholder=" " required />
            <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-accent peer-focus:dark:text-accent peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
        </div>
        <div class="relative z-0 w-full mb-5 group mt-5">
            <input type="text" name="floating_username" id="floating_username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-accent focus:outline-none focus:ring-0 focus:border-accent peer" placeholder="" required />
            <label for="floating_username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-accent duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-accent peer-focus:dark:text-accent peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
        </div>
        <div class="relative z-0 w-full mb-5 group mt-5">
            <input type="tel" pattern="[0-9]{8-15}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-accent focus:outline-none focus:ring-0 focus:border-accent peer" placeholder="" required />
            <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-accent duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-accent peer-focus:dark:text-accent peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone Number [08XXXXXXXXX]</label>
        </div>
        <div class="flex justify-center mt-20">
            <button type="submit" class="w-3/4 border border-accent py-1 px-6 rounded-lg text-accent hover:text-white hover:bg-accent transition-all duration-500">Register</button>
        </div>
    </form>
</div>

<div class="flex flex-col items-center justify-center pt-10">
    <a href="{{ route('register_organization.view') }}" class="hidden text-secondary hover:text-gray-500 transition-all duration-500">Register your organization account</a>
    <span>Already have an account? <a href="{{ route('login_personal.view') }}" class="text-secondary hover:text-gray-500 transition-all duration-500">Login Here!</a></span>
</div>
  
@endsection