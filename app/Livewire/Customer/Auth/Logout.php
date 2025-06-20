<?php

namespace App\Livewire\Customer\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class Logout
{
    public function logout() : RedirectResponse
    {
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();
        
        return redirect()->route('home');
    }
}
