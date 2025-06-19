<?php

namespace App\Livewire\App;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.app')]
class Home extends Component
{
    #[Title('Rent.Car')] 

    public function render()
    {
        return view('livewire.app.home');
    }
}
