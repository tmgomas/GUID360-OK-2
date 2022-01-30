<?php

namespace App\Http\Livewire\Religion;

use App\Models\Religion;
use Livewire\Component;

class CreateReligionForm extends Component
{
    public $religion_isActive = true;
    public $religion_id,$religion_name;
    public $showEditModal = false;
    

    protected $listeners = [
        'newForm', 
        'updateReligion',
        'confirmReligionRemoval'    => 'confirmReligionRemoval',
        'deleteConfirmed'       => 'destroyReligion',
        'updatingReligionIsActive'  => 'updatingReligionIsActive',
    ];
   
    private function resetInput()
    {
        $this->religion_name                     = null;
       
    }
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }
    public function createReligionForm()
    {
        $this->validate([
            'religion_name'      => 'required',
            
        ]);

        try{
            $user = Religion::create([
                'religion_name'  			=>  $this->religion_name,
				
            ]);

           
			$this->emit('CreatedReligionForm');
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

    public function updateReligion($ReligionID)
	{
        $Religion = Religion::findOrFail($ReligionID);
        // dd($student);
        $this->showEditModal = true;
        $this->Religion = $Religion;
        $this->religion_id = $Religion->religion_id;
        $this->religion_name = $Religion->religion_name;
        
       
		$this->dispatchBrowserEvent('show-form');
	}
    public function updatingReligionIsActive($value,$ReligionIsActive)
    {
        //   dd($ReligionIsActive);
       if ($value) {
        $updatingReligionIsActive = Religion::find($value);
       
        $updatingReligionIsActive->update(['religion_isActive' => $ReligionIsActive,]);
       
        $this->emit('updatedReligionIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }
    public function updateReligionForm()
    {
    
        try{
            if ($this->religion_id) {
                $updatingLanguage = Religion::find($this->religion_id);

            
                $updatingLanguage->update([
                    'religion_name'  			=>  $this->religion_name,
                
                ]);
               
                $this->emit('updatedReligionForm');
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

    public function confirmReligionRemoval($ReligionID)
	{
		$this->ReligionBeingRemoved = $ReligionID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyReligion()
	{
		$deleteReligion = Religion::findOrFail($this->ReligionBeingRemoved);

		$deleteReligion->delete();
        $this->emit('deletedReligionForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}
    public function render()
    {
        return view('livewire.religion.create-religion-form');
    }
}
