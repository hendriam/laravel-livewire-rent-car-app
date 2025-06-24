<?php

namespace App\Livewire\Customer\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth-customer')]
class Register extends Component
{
    #[Title('Register - Rent.Car')] 

    public $fullname, $email, $password, $password_confirmation;
    public $phone;

    protected $rules = [
        'fullname' => 'required|string|min:5',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|min:10',
        'password' => 'required|confirmed|min:6',
    ];

    public function register(): void
    {
        $this->validate();

        $user = User::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'type' => 'customer',
        ]);

        Auth::login($user); // langsung login setelah register

        $this->redirectIntended(default: route('home', absolute: false), navigate: false);
    }

    public function render()
    {
        return view('livewire.customer.auth.register');
    }
}
