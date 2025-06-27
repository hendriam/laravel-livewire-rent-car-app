<?php

namespace App\Livewire\App\Bookings;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Booking;

#[Layout('components.layouts.app')]
class BookingConfirm extends Component
{
    #[Title('Detail Booking - Rent.Car')]

    public Booking $booking;

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function render()
    {
        return view('livewire.app.bookings.booking-confirm');
    }
}
