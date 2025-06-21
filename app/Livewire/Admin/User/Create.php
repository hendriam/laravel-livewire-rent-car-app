<?php

namespace App\Livewire\Admin\User;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.admin')]
class Create extends Component
{
    #[Title('Manejemen User')] 
    
    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
