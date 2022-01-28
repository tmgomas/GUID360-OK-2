<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class ShowRoleForm extends Component
{
    public $Roles;

    protected $listeners = [
        'createdRole'    => 'render',
        'updatedRoleForm'=> 'render',
        'deletedRoleForm'    => 'render',
    ];

    public function Roles()
    {
        $this->Roles = Role::all();
    }
    public function render()
    {
        $this->Roles();
        return view('livewire.role.show-role-form');
    }
}
