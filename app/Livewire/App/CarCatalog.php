<?php

namespace App\Livewire\App;

use Livewire\Component;
use App\Models\Car;

class CarCatalog extends Component
{
    public $cars;

    public function mount()
    {
        $this->cars = Car::where('status', 'available')->latest()->take(6)->get();
    }

    public function render()
    {
        return view('livewire.app.car-catalog');
    }
}
