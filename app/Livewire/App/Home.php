<?php

namespace App\Livewire\App;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.app')]
class Home extends Component
{
    #[Title('Rent.Car')] 

    public function mount()
    {
        if (Auth::check() && Auth::user()->type === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.app.home');
    }
}
