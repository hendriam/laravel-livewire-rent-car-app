<?php

namespace App\Livewire\App\Cars;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Car;

class Detail extends Component
{
    #[Title('Detail Mobil - Rent.Car')]

    public Car $car;
    
    public function mount(Car $car)
    {
        $this->car = Car::findOrFail($car->id);
    }

    public function render()
    {
        return view('livewire.app.cars.detail');
    }
}
