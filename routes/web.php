<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AddressController;

Route::get('/', [ProductController::class, 'index'])->name('home.view');
Route::get('/logout', [StudentController::class, 'logout_personal'])->name('logout_personal');

Route::get('/login/personal', [StudentController::class, 'index_login_personal'])->name('login_personal.view');
Route::post('/login/personal', [StudentController::class, 'login_personal'])->name('login_personal.post');

Route::get('/login/organization', [OrganizationController::class, 'index_login_organization'])->name('login_organization.view');

Route::get('/register/personal', [StudentController::class, 'index_register_personal'])->name('register_personal.view');
Route::post('/register/personal', [StudentController::class, 'register_personal'])->name('register_personal.post');

Route::get('/register/organization', [OrganizationController::class, 'index_register_organization'])->name('register_organization.view');

Route::get('/profile', [StudentController::class, 'index_profile'])->name('profile.view');

Route::put('/profile', [StudentController::class, 'change_password'])->name('profile.edit');

Route::get('/product/{id}', [ProductController::class, 'get_product_detail'])->name('product_detail.view');
Route::post('/product', [CartController::class, 'add_to_cart'])->name('cart.add');

Route::get('/popular', [ProductController::class, 'get_popular_products'])->name('popular_products.view');

Route::get('/universities', [UniversityController::class, 'get_all'])->name('universities.view');

Route::get('/university/{id}', [ProductController::class, 'get_product_by_university'])->name('university.view');

Route::get('/organizations', [OrganizationController::class, 'get_all'])->name('organizations.view');

Route::get('/organization/{id}', [ProductController::class, 'get_product_by_organization'])->name('organization.view');

Route::get('/cart', [CartController::class, 'get_all_items'])->name('cart.view');

Route::delete('/cart', [CartController::class, 'remove_item'])->name('cart.destroy');

Route::put('/cart', [CartController::class, 'update_item'])->name('cart.update');

Route::post('/cart', [CartController::class, 'checkout'])->name('cart.checkout');

Route::patch('/cart', [AddressController::class, 'add_address'])->name('address.add');

Route::get('/checkout', [CartController::class, 'index_checkout'])->name('checkout.view');

Route::put('/checkout', [AddressController::class, 'select'])->name('address.select');

Route::post('/checkout', [TransactionController::class, 'add_transaction'])->name('checkout.transaction');

// Route::get('/midtrans', [TransactionController::class, 'midtrans'])->name('midtrans');

Route::get('/order', [TransactionController::class, 'get_all_transactions'])->name('order.view');

Route::get('/order/{id}', [TransactionController::class, 'get_transaction_detail'])->name('order_detail.view');

Route::put('/order/{id}', [TransactionController::class, 'update_transaction'])->name('order.update');

