<?php

namespace App\Livewire\Admin\Car;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;

#[Layout('components.layouts.admin')]
class Show extends Component
{
    #[Title('Manejemen Mobil - Rent.Car')]

    public Car $car;

    public $brand, $model, $plate_number, $year, $price_without_driver, $price_with_driver;
    public $status = 'available', $photo;
    public $oldPhotoPath;

    public function mount(Car $car)
    {
        $this->car = $car;
        $this->brand = $car->brand;
        $this->model = $car->model;
        $this->plate_number = $car->plate_number;
        $this->year = $car->year;
        $this->status = $car->status;
        $this->price_with_driver = $car->price_with_driver;
        $this->price_without_driver = $car->price_without_driver;
        $this->oldPhotoPath = $car->photo;
    }
    
    public function render()
    {
        return view('livewire.admin.car.show');
    }
}
