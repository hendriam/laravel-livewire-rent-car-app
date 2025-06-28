<?php

namespace App\Livewire\App\Bookings;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Booking;

#[Layout('components.layouts.app')]
class BookingConfirm extends Component
{
    #[Title('Konfirimasi Pembayaran - Rent.Car')]

    public Booking $booking;

    public int|null $idToConfirm = null;

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function confirm()
    {
        if ($this->idToConfirm) {
            $booking = Booking::findOrFail($this->idToConfirm);

            $booking->update([
                'status' => 'confirmed'
            ]);
            
            $this->reset('idToConfirm');
            
            // Tutup modal pakai browser event
            $this->dispatch('close-modal-confirm-payment');

            return redirect()->route('bookings.booking-confirm', ['booking' =>$booking->id]);
        }
    }

    public function render()
    {
        return view('livewire.app.bookings.booking-confirm');
    }
}
