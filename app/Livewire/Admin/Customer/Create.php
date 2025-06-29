<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

#[Layout('components.layouts.admin')]
class Create extends Component
{
    #[Title('Manejemen Customer - Rent.Car')] 
    
    public $fullname, $email, $phone, $address, $photo;

    protected $rules = [
        'fullname' => 'required|string|min:6|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|min:10|max:15',
        'address' => 'required|string',
        'photo' => 'nullable|image|max:2048',
    ];

    public function save()
    {
        $this->validate();

        User::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'password' => Hash::make('password123'),
            'phone' => $this->phone,
            'address' => $this->address,
            'type' => 'customer',
            'role' => 'guest',
        ]);

        session()->flash('success', 'Customer baru berhasil ditambahkan!');
        
        // reset form
        $this->reset(); 
    }

    public function render()
    {
        return view('livewire.admin.customer.create');
    }
}
