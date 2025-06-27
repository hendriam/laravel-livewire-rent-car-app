<?php

namespace App\Livewire\App\Bookings;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Driver;

#[Layout('components.layouts.app')]
class WithoutDriver extends Component
{
    #[Title('Form Booking Mobil - Rent.Car')]

    public Car $car;
    
    public $start_date, $end_date, $notes;
    public bool $with_driver = false;

    public $price = 0;

    protected $rules = [
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ];
    
    public function mount(Car $car)
    {
        $this->car = $car;
        $this->price = $car->price_without_driver;
    }

    public function save()
    {
        $this->validate();

        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        $duration = $startDate->diffInDays($endDate);
        $price =  $this->car->price_without_driver;
        $total = $price * $duration;
        $bookingCode = 'KODE'.now()->format('Ymd'). ''.str_pad(Booking::all()->count() + 1, 4, '0', STR_PAD_LEFT);

        $created = Booking::create([
            'booking_code' => $bookingCode,
            'customer_id' => Auth::id(),
            'car_id' => $this->car->id,
            'with_driver' => $this->with_driver,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'duration' => $duration,
            'status' => 'pending',
            'total_price' => $total,
            'notes' => $this->notes,
        ]);

        session()->flash('success', 'Booking berhasil! Silakan tunggu konfirmasi.');
        return redirect()->route('bookings.booking-confirm', ['booking' =>$created->id]);
    }

    public function render()
    {
        $drivers = Driver::where('status', 'available')->get();

        return view('livewire.app.bookings.without-driver', compact('drivers'));
    }
}
