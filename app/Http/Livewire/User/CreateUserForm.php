<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUserForm extends Component
{

    public $rolesName;
    public $userDetails;
    public $showEditModal = false; // Model Defult Disply None

    public $isActive = false;
    public $ids, $name, $email, $password, $password_confirmation, $roles, $userRole;

    protected $listeners = [
        'newForm', 
        'updateUser',
        'updatingIsActive',
        'confirmUserRemoval'    => 'confirmUserRemoval',
        'deleteConfirmed'       => 'destroyUser',
       
    ];

    private function resetInput()
    {
        $this->ids = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        
    }
   
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }

    public function getRoleName()
    {
        $this->rolesName = Role::all();
    }

    protected $rules = [
        'name'      => 'required',
        'email' => 'required|email|unique:users,email',
        'password'  => 'required|confirmed',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createUserForm()
    {
        $validatedData = $this->validate();

        // try{
            $user = User::create([
                'name'  			=>  $this->name,
				'email'  			=>  $this->email,
				'password'  	    =>  $this->password = Hash::make($this->password), 
                
            ]);

            $user->assignRole($this->roles);
            // // Set Flash Message
			$this->emit('createdUserForm');
            $this->resetInput();
            $this->dispatchBrowserEvent('hide-form',[
                'type'=>'success',
                'message'=>"User Created Successfully!!"
            ]);
        // }

        // catch(\Exception $e){
        //     // Set Flash Message
		// 	$this->dispatchBrowserEvent('hide-form',[
        //         'type'=>'error',
        //         'message'=>"Something goes wrong while creating User!!"
		// 	]);
        // }
    }

    public function updateUser($userID)
	{
        $User = User::findOrFail($userID);
        // dd($student);
        $this->showEditModal = true;
        $this->User = $User;
        $this->ids = $User->id;
        $this->name = $User->name;
        $this->email = $User->email;

        $this->roles = Role::pluck('name','name')->all();
        $this->userRole = $User->roles->pluck('name','name')->all();
        // $User->assignRole('Admin');
		$this->dispatchBrowserEvent('show-form');
	}

    public function updateUserForm()
    {
    
        // $validatedData = $this->validate();

        try{
            if ($this->ids) {
                $user = User::find($this->ids);

                $this->password = Hash::make($this->password); 
                $user->update([
                    'name'     => $this->name,
                    'email'    => $this->email,
                    'password' => $this->password,
                ]);

                DB::table('model_has_roles')->where('model_id',$this->ids)->delete();
                $user->assignRole($this->roles);
        
                $this->resetInput();
                $this->emit('updatedUserForm');
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

    public function updatingIsActive($value,$isActive)
    {
    //    dd($isActive);
        if ($value) {
            $user = User::find($value);
           
            $user->update(['isActive' => $isActive]);
            
            $this->emit('updatedIsActive');
            $this->dispatchBrowserEvent('hide-form',[
                'type'=>'success',
                'message'=>"User Status Updated!"
            ]);
        }
    }

    public function confirmUserRemoval($UserID)
	{
		$this->UserBeingRemoved = $UserID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyUser()
	{
		$feeGroup = User::findOrFail($this->UserBeingRemoved);

		$feeGroup->delete();
        $this->emit('deletedUserForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function getUserDetails()
    {
        $this->userDetails = User::all();
    }

    public function render()
    {
        $this->getRoleName();
        return view('livewire.user.create-user-form');
    }
}
