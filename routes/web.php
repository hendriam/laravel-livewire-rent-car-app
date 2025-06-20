<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\App\Home;
use App\Livewire\Customer\Auth\Login as CustomerLogin;
use App\Livewire\Customer\Auth\Register as CustomerRegister;
use App\Livewire\Customer\Auth\ForgotPassword as CustomerForgetPassword;
use App\Livewire\Customer\Auth\Logout as CustomerLogout;

Route::get('/', Home::class)->name('home');

Route::get('login', CustomerLogin::class)->name('login');
Route::get('register', CustomerRegister::class)->name('register');
Route::get('forgot-password', CustomerForgetPassword::class)->name('forgot-password');

Route::post('logout', [CustomerLogout::class, 'logout'])->name('logout');    
