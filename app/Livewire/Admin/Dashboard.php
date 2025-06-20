<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.admin')]
class Dashboard extends Component
{
    #[Title('Dashboard admin - Rent.Car')] 

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
