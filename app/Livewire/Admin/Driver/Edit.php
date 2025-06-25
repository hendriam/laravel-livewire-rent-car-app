<?php

namespace App\Livewire\Admin\Driver;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Driver;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;

    #[Title('Manejemen Supir')] 

    public Driver $driver;

    public $fullname, $phone, $address, $status;
    public $photo;
    public $oldPhotoPath;

    protected $rules = [
        'fullname' => 'required|string|min:6|max:255',
        'phone' => 'required|string|min:10|max:15',
        'address' => 'required|string',
        'status' => 'required|string|in:available,unavailable',
        'photo' => 'nullable|image|max:2048',
    ];

    public function mount(Driver $driver)
    {
        $this->driver = $driver;
        $this->fullname = $driver->fullname;
        $this->phone = $driver->phone;
        $this->address = $driver->address;
        $this->status = $driver->status;
        $this->oldPhotoPath = $driver->photo;
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
            $photoPath = $this->photo->store('drivers', 'public');
        }

        
        $this->driver->update([
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'address' => $this->address,
            'status' => $this->status,
            'photo' => $photoPath ?? null,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Supir berhasil diperbarui.');
        return redirect()->route('admin.drivers.edit', ['driver' => $this->driver]);
    }

    public function render()
    {
        return view('livewire.admin.driver.edit');
    }
}
