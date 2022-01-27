<?php

namespace App\Http\Livewire\Permission;

use Illuminate\Http\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class ShowPermissionForm extends Component
{
    public $Permissions;
    

    protected $listeners = [
        'createdPermissionForm'  => 'getPermissionList',
        'updatedPermissionForm'  => 'getPermissionList',
        'deletedPermissionForm'  => 'getPermissionList',
    ];

    public function getPermissionList()
    {
        $this->Permissions = Permission::orderBy('id')->get()->groupBy(function($item){
            return $item->name_group;
        })->toBase();
    }
    
    public function render()
    {
        $this->getPermissionList();
        return view('livewire.permission.show-permission-form');
    }
}
