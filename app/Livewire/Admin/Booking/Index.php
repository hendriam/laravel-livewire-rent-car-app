<?php

namespace App\Livewire\Admin\Booking;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

use App\Models\Booking;

#[Layout('components.layouts.admin')]
class Index extends Component
{
    use WithPagination;

    #[Title('Manejemen Booking')] 

    public string $search = '';
    public string $sortField = 'created_at';
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

    public function updateStatus()
    {
       
    }

    public function render()
    {
        $bookings = Booking::where('booking_code', 'like', "%{$this->search}%")
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.booking.index', compact('bookings'));
    }
   
}
