<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\App\Home;

// for customer
use App\Livewire\Customer\Auth\Login as CustomerLogin;
use App\Livewire\Customer\Auth\Register as CustomerRegister;
use App\Livewire\Customer\Auth\ForgotPassword as CustomerForgetPassword;

//  Cars controller
use App\Livewire\App\Cars\Index as CarsIndex;
use App\Livewire\App\Cars\Detail as CarsDetail;

// for admin 
use App\Livewire\Admin\Auth\Login as AdminLogin;
use App\Livewire\Admin\Dashboard as AdminDashboard;

// User controllers
use App\Livewire\Admin\User\Index as AdminUserIndex;
use App\Livewire\Admin\User\Create as AdminUserCreate;
use App\Livewire\Admin\User\Edit as AdminUserEdit;

// Driver controllers
use App\Livewire\Admin\Driver\Index as AdminDriverIndex;
use App\Livewire\Admin\Driver\Create as AdminDriverCreate;
use App\Livewire\Admin\Driver\Edit as AdminDriverEdit;

// Driver cars
use App\Livewire\Admin\Car\Index as AdminCarIndex;
use App\Livewire\Admin\Car\Create as AdminCarCreate;
use App\Livewire\Admin\Car\Edit as AdminCarEdit;
use App\Livewire\Admin\Car\Show as AdminCarShow;

use App\Http\Controllers\LogoutAdminController;
use App\Http\Controllers\LogoutCustomerController;

Route::get('/', Home::class)->name('home');
Route::get('/cars', CarsIndex::class)->name('cars.index');
Route::get('/cars/{car}/detail', CarsDetail::class)->name('cars.detail');

Route::get('login', CustomerLogin::class)->name('login');
Route::get('register', CustomerRegister::class)->name('register');
Route::get('forgot-password', CustomerForgetPassword::class)->name('forgot-password');

Route::get('admin', AdminLogin::class)->name('admin');
Route::get('admin/login', AdminLogin::class)->name('admin.login');


Route::middleware(['isAdmin'])->prefix('admin')->name('admin.')->group(function () {
	Route::get('dashboard', AdminDashboard::class)->name('dashboard');

	// User routes
	Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', AdminUserIndex::class)->name('index');
        Route::get('/create', AdminUserCreate::class)->name('create');
		Route::get('/{user}/edit', AdminUserEdit::class)->name('edit');
    });

	// Driver routes
	Route::prefix('drivers')->name('drivers.')->group(function () {
        Route::get('/', AdminDriverIndex::class)->name('index');
        Route::get('/create', AdminDriverCreate::class)->name('create');
		Route::get('/{driver}/edit', AdminDriverEdit::class)->name('edit');
    });

	// Car routes
	Route::prefix('cars')->name('cars.')->group(function () {
        Route::get('/', AdminCarIndex::class)->name('index');
        Route::get('/create', AdminCarCreate::class)->name('create');
		Route::get('/{car}/edit', AdminCarEdit::class)->name('edit');
		Route::get('/{car}/show', AdminCarShow::class)->name('show');
    });

	Route::post('logout', [LogoutAdminController::class, 'logout'])->name('logout');    
});

Route::middleware(['isCustomer'])->group(function () {

	// Cars catalog routes

	Route::post('logout', [LogoutCustomerController::class, 'logout'])->name('logout');    
});




