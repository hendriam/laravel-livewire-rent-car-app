<?php

namespace App\Livewire\Customer\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth-customer')]
class ForgotPassword extends Component
{
    #[Title('Forgot Password - Rent.Car')] 

    public string $email = '';

    public function render()
    {
        return view('livewire.customer.auth.forgot-password');
    }
}
