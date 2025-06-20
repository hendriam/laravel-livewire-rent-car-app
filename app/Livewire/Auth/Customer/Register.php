<?php

namespace App\Livewire\Auth\Customer;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth-customer')]
class Register extends Component
{
    #[Title('Register - Rent.Car')] 

    public function render()
    {
        return view('livewire.auth.customer.register');
    }
}
