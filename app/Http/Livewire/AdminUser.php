<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminUser extends Component
{

    public $firstname, $lastname, $sex, $birthdate, $address, $phone_number, $username, $email, $role;

    public function store() {
       return 'hello';
    }

    public function render()
    {
        $users = User::orderBy('id', 'DESC')->get();

        return view('livewire.admin.admin-user', ['users' => $users]);
    }
}
