<?php

namespace App\Http\Livewire\Permission;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermissionForm extends Component
{

    public $showEditModal = false;
    
    public $PermissionName; // Get Permission Name for Add for Permission
    public $name = [], $name_group ;


    protected $listeners = [
        'newForm', 
        'updatePermission',
        'confirmPermissionRemoval'    => 'confirmPermissionRemoval',
        'deleteConfirmed'       => 'destroyPermission',
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


    public function createPermissionForm()
    {
        $this->validate([
            'name'      =>  [
                'required',
                Rule::unique(Permission::class),
            ],
        ]);
       
        // try{
           
            if (is_array($this->name) || is_object($this->name))
            {
                foreach ($this->name as $key => $value) {
                   $d = Permission::create([
                        'name'  			=> $this->name[$key],
                        'name_group'  			=> $this->PermissionName,
                    ]);
                }
            }
        //    dd($d);
            // // Set Flash Message
			$this->emit('createdPermissionForm');
            $this->resetInput();
            $this->dispatchBrowserEvent('hide-form',[
                'type'=>'success',
                'message'=>"User Created Successfully!!"
            ]);
        // }

        // catch(\Exception $e){
            // Set Flash Message
			// $this->dispatchBrowserEvent('hide-form',[
            //     'type'=>'error',
            //     'message'=>"Something goes wrong while creating User!!"
			// ]);

            
        // }
    }

    public function updatePermission(Permission $PermissionID)
	{
        $this->showEditModal = true;
        $this->PermissionID  = $PermissionID;
        $this->ids           = $PermissionID->id;
        $this->name          = $PermissionID->name;
        $this->name_group          = $PermissionID->name_group;
        
		$this->dispatchBrowserEvent('show-form');
	}
    
    public function updatePermissionForm()
    {
        try{
            if ($this->ids) {
                $role = Permission::find($this->ids);
                $role->update([
                    'name' => $this->name,
                    'name_group'  			=> $this->PermissionName,
                ]);
                // DB::table('model_has_roles')->where('model_id',$this->ids)->delete();
                // $user->assignRole($this->roles);

                $this->resetInput();
                $this->emit('updatedPermissionForm');
                $this->dispatchBrowserEvent('hide-form',[
                    'type'=>'success',
                    'message'=>"User Update Successfully!!"
                    
                ]);
            $this->updateMode = false;
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

    public function confirmPermissionRemoval($PermissionID)
	{
		$this->PermissionBeingRemoved = $PermissionID;

		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyPermission()
	{
		$role = Permission::findOrFail($this->PermissionBeingRemoved);

		$role->delete();
        $this->emit('deletedPermissionForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}
    
    public function render()
    {
        return view('livewire.permission.create-permission-form');
    }

    
}
