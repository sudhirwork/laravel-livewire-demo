<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $users, $email, $password, $name;

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
            session()->flash('message', "You are Login successfully.");
            if (Auth::check()) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'You are Login successfully!']
                );
                // dd('aa', Auth::check());
                return redirect()->to('/admin');
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Please Log in!!']
                );
            }
        } else {
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function register()
    {
        return redirect()->to('/register');
    }
}
