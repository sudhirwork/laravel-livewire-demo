<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $users, $email, $password, $name;

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.register');
    }

    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->password = Hash::make($this->password);


        $user =  User::create(['name' => $this->name, 'email' => $this->email, 'password' => $this->password]);
        // $token = $user->createToken('API Token')->accessToken;

        session()->flash('message', 'Your register successfully Go to the login page.');

        $this->resetInputFields();
    }
    public function login()
    {
        return redirect()->to('/login');
    }
}
