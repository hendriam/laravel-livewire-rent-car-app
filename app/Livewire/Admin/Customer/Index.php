<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

#[Layout('components.layouts.admin')]
class Index extends Component
{
    use WithPagination;

    #[Title('Manejemen Customer - Rent.Car')] 

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

            $user = User::findOrFail($this->idToDelete);
            if (Auth::id() === $user->id) {
                $this->dispatch('close-delete-confirm');
                session()->flash('error', 'Tidak bisa menghapus akun sendiri!');
                return;
            }

            $user->delete();
            
            // Reset idToDelete untuk menghindari penghapusan berulang
            $this->reset('idToDelete');
            
            // Tutup modal pakai browser event
            $this->dispatch('close-delete-confirm');

            session()->flash('success', 'Customer berhasil dihapus.');
        }
    }

    public function render()
    {
        $users = User::where('type', 'customer')
            ->where(function ($query) {
                $query->where('fullname', 'like', "%{$this->search}%")
                    ->orWhere('email', 'like', "%{$this->search}%");
                })->orderBy($this->sortField, $this->sortDirection)->paginate(10);

        return view('livewire.admin.customer.index', compact('users'));
    }
}
