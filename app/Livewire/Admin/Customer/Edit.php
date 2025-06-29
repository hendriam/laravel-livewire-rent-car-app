<?php

namespace App\Livewire\Admin\Customer;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\User;

#[Layout('components.layouts.admin')]
class Edit extends Component
{
    #[Title('Manejemen User')] 

    public User $user;

    public $fullname, $email, $phone, $address, $photo;

    protected function rules()
    {
        return [
            'fullname' => 'required|string|min:6|max:255',
            'email' => 'required|email|unique:users,email,' . ($this->user->id ?? 'NULL'),
            'phone' => 'required|string|min:10|max:15',
            'address' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->fullname = $user->fullname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
    }

    public function update()
    {
        // Validasi
        $this->validate();

        $this->user->update([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        session()->flash('success', 'Customer berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.admin.customer.edit');
    }
}
