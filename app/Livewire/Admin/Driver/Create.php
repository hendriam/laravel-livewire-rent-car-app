<?php

namespace App\Livewire\Admin\Driver;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\Driver;

#[Layout('components.layouts.admin')]
class Create extends Component
{
    use WithFileUploads;

    #[Title('Manejemen Supir')] 
        
    public $fullname, $phone, $address, $status, $photo;

    protected $rules = [
        'fullname' => 'required|string|min:6|max:255',
        'phone' => 'required|string|min:10|max:15',
        'address' => 'required|string',
        'status' => 'required|string|in:available,unavailable',
        'photo' => 'nullable|image|max:2048',
    ];

    public function save()
    {
        $this->validate();

        $photoPath = null;
        if ($this->photo) {
            $photoPath = $this->photo->store('drivers', 'public');
        }

        $created = Driver::create([
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'address' => $this->address,
            'status' => $this->status,
            'photo' => $photoPath ?? null,
            'created_by' => Auth::id(),
        ]);

        session()->flash('success', 'Supir baru berhasil ditambahkan!');
        return redirect()->route('admin.drivers.edit', ['driver' => $created->driver]);
    }

    public function render()
    {
        return view('livewire.admin.driver.create');
    }
}
