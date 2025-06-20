<?php

namespace App\Livewire\Auth\Customer;

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
        return view('livewire.auth.customer.forgot-password');
    }
}
