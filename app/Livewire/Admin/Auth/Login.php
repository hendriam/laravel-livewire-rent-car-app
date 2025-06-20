<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth-admin')]
class Login extends Component
{
    #[Title('Login admin - Rent.Car')] 

    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function login(): void
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            if (Auth::user()->type !== 'admin') {
                Auth::logout();
                $this->addError('email', 'Akses ditolak. Anda bukan admin.');
                return;
            }

            session()->regenerate();
            $this->redirectIntended(default: route('admin.dashboard', absolute: false), navigate: false);
        }

        $this->addError('email', 'Email atau password salah.');
    }
    
    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
