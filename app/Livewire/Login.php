<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public ?string $email    = null;
    public ?string $password = null;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        if(Auth::attempt([
            'email'    => $this->email,
            'password' => $this->password
        ])) {
            return redirect('/');
        }
    }
}
