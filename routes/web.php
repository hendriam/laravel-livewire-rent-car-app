<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\App\Home;

// for customer
use App\Livewire\Customer\Auth\Login as CustomerLogin;
use App\Livewire\Customer\Auth\Register as CustomerRegister;
use App\Livewire\Customer\Auth\ForgotPassword as CustomerForgetPassword;

// for admin 
use App\Livewire\Admin\Auth\Login as AdminLogin;
use App\Livewire\Admin\Dashboard as AdminDashboard;

use App\Http\Controllers\LogoutController;

Route::get('/', Home::class)->name('home');

Route::get('login', CustomerLogin::class)->name('login');
Route::get('register', CustomerRegister::class)->name('register');
Route::get('forgot-password', CustomerForgetPassword::class)->name('forgot-password');

Route::get('admin/login', AdminLogin::class)->name('admin.login');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
		Route::get('dashboard', AdminDashboard::class)->name('dashboard');
	});

	Route::post('logout', [LogoutController::class, 'logout'])->name('logout');    
});




