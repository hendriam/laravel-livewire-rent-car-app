<?php

namespace App\Livewire\Admin\Car;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Laravel\Facades\Image;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

use App\Models\Car;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;

    #[Title('Manejemen Mobil - Rent.Car')]

    public Car $car;

    public $brand, $model, $plate_number, $color, $year, $price_without_driver, $price_with_driver;
    public $status = 'available', $photo;
    public $oldPhotoPath;

    protected function rules() {
        return [
            'brand' => 'required|string|min:3|max:255',
            'model' => 'required|string|min:3|max:255',
            'plate_number' => 'required|string|min:6|max:12|unique:cars,plate_number,'.$this->car->id,
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'status' => 'required|string|in:available,rented,maintenance',
            'price_without_driver' => 'required|numeric|min:3',
            'price_with_driver' => 'required|numeric|min:3',
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function mount(Car $car)
    {
        $this->car = $car;
        $this->brand = $car->brand;
        $this->model = $car->model;
        $this->plate_number = $car->plate_number;
        $this->color = $car->color;
        $this->year = $car->year;
        $this->status = $car->status;
        $this->price_with_driver = $car->price_with_driver;
        $this->price_without_driver = $car->price_without_driver;
        $this->oldPhotoPath = $car->photo;
    }

    public function update()
    {
        // Validasi
        $this->validate();

        $photoPath = $this->oldPhotoPath;

        if ($this->photo instanceof TemporaryUploadedFile) {
            // Hapus avatar lama jika ada
            if ($this->oldPhotoPath && Storage::disk('public')->exists($this->oldPhotoPath)) {
                Storage::disk('public')->delete($this->oldPhotoPath);
            }

            // Simpan avatar baru
            $image = Image::read($this->photo->getRealPath())->resize(800, 500);
            $filename = 'cars/' . uniqid() . '.' . $this->photo->getClientOriginalExtension();
            Storage::disk('public')->put($filename, (string) $image->encode());
            $photoPath = $filename;
        }
        
        $this->car->update([
            'brand' => $this->brand,
            'model' => $this->model,
            'plate_number' => $this->plate_number,
            'color' => $this->color,
            'year' => $this->year,
            'status' => $this->status,
            'price_without_driver' => $this->price_without_driver,
            'price_with_driver' => $this->price_with_driver,
            'photo' => $photoPath ?? null,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Mobil '.$this->model.' berhasil diperbarui.');
        return redirect()->route('admin.cars.edit', ['car' => $this->car]);
    }

    public function render()
    {
        return view('livewire.admin.car.edit');
    }
}
