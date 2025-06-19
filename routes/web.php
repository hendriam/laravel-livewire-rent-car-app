<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\App\Home;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ForgotPassword;

Route::get('/', Home::class)->name('home');

Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');
Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');