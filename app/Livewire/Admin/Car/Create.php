<?php

namespace App\Livewire\Admin\Car;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Laravel\Facades\Image;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

use App\Models\Car;

#[Layout('components.layouts.admin')]
class Create extends Component
{
    use WithFileUploads;

    #[Title('Manejemen Mobil - Rent.Car')]

    public $brand, $model, $plate_number, $year, $price_without_driver, $price_with_driver;
    public $status = 'available', $photo;

    protected function rules() {
        return [
            'brand' => 'required|string|min:3|max:255',
            'model' => 'required|string|min:3|max:255',
            'plate_number' => 'required|string|min:6|max:12|unique:cars,plate_number,',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'status' => 'required|string|in:available,rented,maintenance',
            'price_without_driver' => 'required|numeric|min:3',
            'price_with_driver' => 'required|numeric|min:3',
            'photo' => 'nullable|image|max:2048',
        ];
    }
   
    public function save()
    {
        $this->validate();

        $photoPath = null;
        if ($this->photo) {
            $image = Image::read($this->photo->getRealPath())->resize(800, 500);
            $filename = 'cars/' . uniqid() . '.' . $this->photo->getClientOriginalExtension();
            Storage::disk('public')->put($filename, (string) $image->encode());
            $photoPath = $filename;
        }

        $created = Car::create([
            'brand' => $this->brand,
            'model' => $this->model,
            'plate_number' => $this->plate_number,
            'year' => $this->year,
            'status' => $this->status,
            'price_without_driver' => $this->price_without_driver,
            'price_with_driver' => $this->price_with_driver,
            'photo' => $photoPath ?? null,
            'created_by' => Auth::id(),
        ]);

        session()->flash('success', 'Mobil baru berhasil ditambahkan!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.car.create');
    }
}
