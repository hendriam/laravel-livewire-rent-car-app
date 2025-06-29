<?php

namespace App\Livewire\Admin\Booking;

use Illuminate\Support\Facades\Auth;

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

    public int|null $idToRented = null;
    public int|null $idToCancelled = null;
    public int|null $idToCompleted = null;

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

    public function updateStatusToRented()
    {
        if ($this->idToRented) {
            $booking = Booking::findOrFail($this->idToRented);

            $booking->update([
                'status' => 'rented',
                'confirmed_by' => Auth::id()
            ]);
            
            $this->reset('idToRented');
            
            // Tutup modal pakai browser event
            $this->dispatch('close-rented-status-modal');

            session()->flash('success', 'Kode booking '.$booking->booking_code.' berhasil diterima.');
        }
    }

    public function updateStatusToCancelled()
    {
        if ($this->idToCancelled) {
            $booking = Booking::findOrFail($this->idToCancelled);

            $booking->update([
                'status' => 'cancelled',
                'cancelled_by' => Auth::id()
            ]);
            
            $this->reset('idToCancelled');
            
            // Tutup modal pakai browser event
            $this->dispatch('close-cancelled-status-modal');

            session()->flash('success', 'Kode booking '.$booking->booking_code.' berhasil dibatalkan.');
        }
    }

    public function updateStatusToCompleted()
    {
        if ($this->idToCompleted) {
            $booking = Booking::findOrFail($this->idToCompleted);

            $booking->update([
                'status' => 'completed',
                'completed_by' => Auth::id()
            ]);
            
            $this->reset('idToCompleted');
            
            // Tutup modal pakai browser event
            $this->dispatch('close-completed-status-modal');

            session()->flash('success', 'Kode booking '.$booking->booking_code.' berhasil diselesaikan.');
        }
    }

    public function render()
    {
        $bookings = Booking::where('booking_code', 'like', "%{$this->search}%")
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.admin.booking.index', compact('bookings'));
    }
   
}
