<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRoleForm extends Component
{
    public $showEditModal = false;

    public $Permissions;
    public $roles;
    public $permission;
    public $permissionlist = [];
    public $ids,$name;
    
    protected $listeners = [
        'newForm', 
        'updateRole',
        'confirmRoleRemoval'    => 'confirmRoleRemoval',
        'deleteConfirmed'       => 'destroyRole',
    ];
    

    private function resetInput()
    {
        $this->guard_name               = null;
    }
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }

    
   
    public function createRoleForm()
    {
        $this->validate([
            'name'      => 'required',
        ]);

        try{
            $role = Role::create(['name'  =>  $this->name,]);
            $role->syncPermissions($this->permissionlist);
            // dd($role);
			$this->emit('createdRoleForm');
            $this->resetInput();
            $this->dispatchBrowserEvent('hide-form',[
                'type'=>'success',
                'message'=>"User Created Successfully!!"
            ]);
        }

        catch(\Exception $e){
            // Set Flash Message
			$this->dispatchBrowserEvent('hide-form',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating User!!"
			]);

            
        }
    }

    public function updateRole(Role $Roles)
	{
        $this->showEditModal = true;
        $this->Roles        = $Roles;
        $this->ids           = $Roles->id;
        $this->name          = $Roles->name;
        
        
		$this->dispatchBrowserEvent('show-form');
	}
    public function updateRoleForm()
    {
        try{
            if ($this->ids) {
                $role = Role::find($this->ids);
                $role->update([
                    'name' => $this->name,
                ]);

                $role->givePermissionTo($this->permissionlist);
                $role->revokePermissionTo($this->permissionlist);
                $this->resetInput();
                $this->emit('updatedRoleForm');
                $this->dispatchBrowserEvent('hide-form',[
                    'type'=>'success',
                    'message'=>"User Update Successfully!!"
                    
                ]);
          
            }
        }
        catch(\Exception $e){
            // Set Flash Message
            $this->dispatchBrowserEvent('hide-form',[
				'type'=>'error',
                'message'=>"Something goes wrong while updatting User!!"
				
			]);
        }
    }
    public function confirmRoleRemoval($RoleID)
	{
		$this->RoleBeingRemoved = $RoleID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyRole()
	{
		$role = Role::findOrFail($this->RoleBeingRemoved);

		$role->delete();
        $this->emit('deletedRoleForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function render()
    {
        $this->Permissions = Permission::orderBy('id')->get()->groupBy(function($item){
            return $item->name_group;
        })->toBase();
        return view('livewire.role.create-role-form');
    }
}
