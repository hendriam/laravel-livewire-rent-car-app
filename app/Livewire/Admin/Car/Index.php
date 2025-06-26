<?php

namespace App\Livewire\Admin\Car;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\Car;

#[Layout('components.layouts.admin')]
class Index extends Component
{
    use WithPagination;

    #[Title('Manejemen Mobil - Rent.Car')]

    public string $search = '';
    public string $sortField = 'brand';
    public string $sortDirection = 'asc';

    protected $queryString = ['search', 'sortField', 'sortDirection'];

    public int|null $idToDelete = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field
            ? ($this->sortDirection === 'asc' ? 'desc' : 'asc')
            : 'asc';

        $this->sortField = $field;
    }

    public function delete()
    {
        if ($this->idToDelete) {
            $car = Car::findOrFail($this->idToDelete);

            // Hapus file foto dari storage jika ada
            if ($car->photo && Storage::disk('public')->exists($car->photo)) {
                Storage::disk('public')->delete($car->photo);
            }

            $car->delete();
            
            // Reset idToDelete untuk menghindari penghapusan berulang
            $this->reset('idToDelete');
            
            // Tutup modal pakai browser event
            $this->dispatch('close-delete-confirm');

            session()->flash('success', 'Mobil '.$car->brand.' berhasil dihapus.');
        }
    }

    public function render()
    {
        $cars = Car::where('brand', 'like', "%{$this->search}%")
            ->orWhere('model', 'like', "%{$this->search}%")
            ->orWhere('plate_number', 'like', "%{$this->search}%")
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.car.index', compact('cars'));
    }
}
