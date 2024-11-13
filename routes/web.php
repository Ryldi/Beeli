<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrganizationController;

Route::get('/', function(){return view('pages.main');})->name('home.view');

Route::get('/login/personal', [StudentController::class, 'index_login_personal'])->name('login_personal.view');
Route::post('/login/personal', [StudentController::class, 'login_personal'])->name('login_personal.insert');

Route::get('/login/organization', [OrganizationController::class, 'index_login_organization'])->name('login_organization.view');

Route::get('/register/personal', [StudentController::class, 'index_register_personal'])->name('register_personal.view');

Route::get('/register/organization', [OrganizationController::class, 'index_register_organization'])->name('register_organization.view');