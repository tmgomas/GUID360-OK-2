<?php

namespace App\Http\Livewire\Gender;

use App\Models\Gender;
use Livewire\Component;

class CreateGenderForm extends Component
{

    public $gender_isActive = true;
    public $gender_id,$gender_name;
    public $showEditModal = false;
    protected $listeners = [
        'newForm', 
        'updateGender',
        'confirmGenderRemoval'    => 'confirmGenderRemoval',
        'deleteConfirmed'       => 'destroyGender',
        'updatingTitleIsActive'  => 'updatingTitleIsActive',
    ];
   
    private function resetInput()
    {
        $this->gender_name                     = null;
       
    }
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }

    public function createGenderForm()
    {
        $this->validate([
            'gender_name'      => 'required',
            
        ]);

        try{
            $user = Gender::create([
                'gender_name'  			=>  $this->gender_name,
				
            ]);

           
			$this->emit('CreatedGenderForm');
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
    public function updateGender($GenderID)
	{
        $Gender = Gender::findOrFail($GenderID);
        // dd($student);
        $this->showEditModal = true;
        $this->Title = $Gender;
        $this->gender_id = $Gender->gender_id;
        $this->gender_name = $Gender->gender_name;
        
       
		$this->dispatchBrowserEvent('show-form');
	}

    public function updatingTitleIsActive($value,$GenderIsActive)
    {
        //   dd($TitleIsActive);
       if ($value) {
        $updatingGender = Gender::find($value);
       
        $updatingGender->update(['gender_isActive' => $GenderIsActive,]);
       
        $this->emit('updatedGenderIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }

    public function updateGenderForm()
    {
    
        try{
            if ($this->gender_id) {
                $updatingLanguage = Gender::find($this->gender_id);

            
                $updatingLanguage->update([
                    'gender_name'  			=>  $this->gender_name,
                
                ]);
               
                $this->emit('updatedGenderForm');
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

    public function confirmGenderRemoval($GenderID)
	{
		$this->GenderBeingRemoved = $GenderID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyGender()
	{
		$deleteGender = Gender::findOrFail($this->GenderBeingRemoved);

		$deleteGender->delete();
        $this->emit('deletedGenderForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function render()
    {
        return view('livewire.gender.create-gender-form');
    }
}
