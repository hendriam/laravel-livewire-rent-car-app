<?php

namespace App\Livewire\App\Cars;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Car;

#[Layout('components.layouts.app')]
class Index extends Component
{
    #[Title('Semua Mobil - Rent.Car')] 

    public $perPage = 6;

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function render()
    {
        return view('livewire.app.cars.index', [
            'cars' => Car::where('status', 'available')->latest()->paginate($this->perPage),
        ]);
    }
}
