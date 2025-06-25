<?php

namespace App\Livewire\Admin\Driver;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Models\Driver;

#[Layout('components.layouts.admin')]
class Index extends Component
{
    use WithPagination;

    #[Title('Manejemen Supir')] 

    public string $search = '';
    public string $sortField = 'fullname';
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
            $driver = Driver::findOrFail($this->idToDelete);

            // Hapus file foto dari storage jika ada
            if ($driver->photo && Storage::disk('public')->exists($driver->photo)) {
                Storage::disk('public')->delete($driver->photo);
            }

            $driver->delete();
            
            // Reset idToDelete untuk menghindari penghapusan berulang
            $this->reset('idToDelete');
            
            // Tutup modal pakai browser event
            $this->dispatch('close-delete-confirm');

            session()->flash('success', 'Supir berhasil dihapus.');
        }
    }

    public function render()
    {
        $drivers = Driver::where('fullname', 'like', "%{$this->search}%")
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.driver.index', compact('drivers'));
    }
}
