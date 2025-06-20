<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\App\Home;
use App\Livewire\Auth\Customer\Login as CustomerLogin;
use App\Livewire\Auth\Customer\Register as CustomerRegister;
use App\Livewire\Auth\Customer\ForgotPassword as CustomerForgetPassword;
use App\Livewire\Customer\Auth\Logout;

Route::get('/', Home::class)->name('home');

Route::get('login', CustomerLogin::class)->name('login');
Route::get('register', CustomerRegister::class)->name('register');
Route::get('forgot-password', CustomerForgetPassword::class)->name('forgot-password');

Route::post('logout', [Logout::class, 'logout'])->name('logout');    
