@extends('layouts.master')

@section('content')

@include('components.toast')

<div class="container mt-40 px-14 flex flex-col">
    <div class="flex flex-col">
        <div class="text-5xl font-bold">PROFILE</div>
    </div>
    <div class="mt-5 md:mt-10 md:px-20 border-black border-2 rounded-lg p-10 gap-10 grid grid-cols-2">
        <div class="flex flex-col col-span-2">
            <div class="text-3xl font-semibold">Name</div>
            <div class="text-xl">{{ session('student')->username }}</div>
        </div>
        <div class="flex flex-col col-span-2">
            <div class="text-3xl font-semibold">Email</div>
            <div class="text-xl">{{ session('student')->email }}</div>
        </div>
        <div class="flex flex-col col-span-2">
            <div class="text-3xl font-semibold">Phone Number</div>
            <div class="text-xl">+62 {{ session('student')->phone }}</div>
        </div>
        <div class="flex flex-col col-span-2 md:col-span-1">
            <div class="text-3xl font-semibold">Password</div>
            <div class="flex">
                <input
                type="password"
                id="passwordInput"
                class="text-xl bg-transparent border-0 focus:outline-none w-2/3"
                value="{{ session('student')->password }}"
                readonly
                />
                <!-- Eye button -->
                <button
                    type="button"
                    id="togglePassword"
                    class="text-gray-500 hover:text-gray-700"
                >
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5C7.305 4.5 3.141 7.4 1.5 12c1.641 4.6 5.805 7.5 10.5 7.5s8.859-2.9 10.5-7.5C20.859 7.4 16.695 4.5 12 4.5z" />
                        <circle cx="12" cy="12" r="3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5C7.305 4.5 3.141 7.4 1.5 12c1.641 4.6 5.805 7.5 10.5 7.5s8.859-2.9 10.5-7.5C20.859 7.4 16.695 4.5 12 4.5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                    </svg>                    
                </button>
            </div>
        </div>
        <div class="col-span-2 md:col-span-1 grid place-content-end">
            <!-- Modal toggle -->
            <div class="">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-md px-4 py-1 bg-accent text-white rounded-lg hover:bg-white hover:text-accent hover:border hover:border-accent transition-all duration-500" type="button">
                    Change Password
                </button>
            </div>
            
            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="z-50 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-lg max-h-full min-h-[80vh]">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center p-4 md:p-5 border-b rounded-t gap-5">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Change Password
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5 flex flex-col justify-center" method="POST" action="{{ route('profile.edit') }}">
                            @csrf
                            @method('PUT')
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
                                    <input type="password" name="old_password" id="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type old password" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                                    <input type="password" name="new_password" id="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="New password" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Confirm password" required="">
                                </div>
                            </div>
                            <button type="submit" class="text-accent inline-flex items-center justify-center border border-accent hover:border-accent hover:text-white hover:bg-accent focus:ring-4 focus:outline-none focus:ring-accent-selected font-medium rounded-lg text-sm px-5 py-2.5 my-8 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-500">
                                Change
                            </button>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<script>
    document.getElementById("togglePassword").addEventListener("click", function () {
        const passwordInput = document.getElementById("passwordInput");
        const eyeIcon = document.getElementById("eyeIcon");
        const eyeSlashIcon = document.getElementById("eyeSlashIcon");

        // Toggle the type attribute
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.add("hidden");
            eyeSlashIcon.classList.remove("hidden");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("hidden");
            eyeSlashIcon.classList.add("hidden");
        }
    });
</script>
@endsection
