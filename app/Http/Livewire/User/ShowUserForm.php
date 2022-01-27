<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class ShowUserForm extends Component
{
    public $users;
    
    protected $listeners = [
        'createdUserForm'  => 'getUserList',
        'updatedUserForm'  => 'getUserList',
        'deletedUserForm'  => 'getUserList',
        'updatedIsActive'  => 'getUserList',
    ];


    public function getUserList()
    {
        $this->users = User::all();
    }

    public function render()
    {
        $this->getUserList();
        return view('livewire.user.show-user-form');
    }
}
