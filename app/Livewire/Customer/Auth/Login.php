<?php

namespace App\Livewire\Customer\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth-customer')]
class Login extends Component
{
    #[Title('Login - Rent.Car')] 

    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function login(): void
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            if (Auth::user()->type !== 'customer') {
                Auth::logout();
                $this->addError('email', 'Akses ditolak. Anda bukan customer.');
                return;
            }

            session()->regenerate();
            $this->redirectIntended(default: route('home', absolute: false), navigate: false);
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.customer.auth.login');
    }
}
