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
class WithDriver extends Component
{
    #[Title('Form Booking Mobil - Rent.Car')]

    public Car $car;
    
    public $start_date, $end_date, $notes;
    public int $driver_id;
    public bool $with_driver = true;

    public $price = 0;

    protected $rules = [
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
        'driver_id' => 'required|exists:drivers,id',
    ];
    
    public function mount(Car $car)
    {
        $this->car = $car;
        $this->price = $car->price_with_driver;
    }

    public function save()
    {
        $this->validate();

        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        $duration = $startDate->diffInDays($endDate);
        $price =  $this->car->price_with_driver;
        $total = $price * $duration;
        $bookingCode = 'KODE'.now()->format('Ymd'). ''.str_pad(Booking::all()->count() + 1, 4, '0', STR_PAD_LEFT);

        $created = Booking::create([
            'booking_code' => $bookingCode,
            'customer_id' => Auth::id(),
            'car_id' => $this->car->id,
            'driver_id' => $this->driver_id,
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

        return view('livewire.app.bookings.with-driver', compact('drivers'));
    }
}
