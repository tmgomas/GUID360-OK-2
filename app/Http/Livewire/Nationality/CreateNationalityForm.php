<?php

namespace App\Http\Livewire\Nationality;

use App\Models\Nationality;
use Livewire\Component;

class CreateNationalityForm extends Component
{
    public $nationaliti_isActive = true;
    public $nati_id,$nati_en_short_name,$nationality;
    public $showEditModal = false;
    

    protected $listeners = [
        'newForm', 
        'updateNationality',
        'confirmNationalityRemoval'    => 'confirmNationalityRemoval',
        'deleteConfirmed'       => 'destroyNationlity',
        'updatingNationalityIsActive'  => 'updatingNationalityIsActive',
    ];
   
    private function resetInput()
    {
        $this->lang_name                     = null;
        $this->lang_iso                    = null;
       
    }
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }
    public function createNationalityForm()
    {
        $this->validate([
            'nati_en_short_name'      => 'required',
            'nationality'      => 'required',
            
        ]);

        try{
            $user = Nationality::create([
                'nati_en_short_name'  			=>  $this->nati_en_short_name,
				'nationality'  			=>  $this->nationality,
            ]);

           
			$this->emit('createdNationalityForm');
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

    public function updateNationality($NationalityID)
	{
        $Nationality = Nationality::findOrFail($NationalityID);
        // dd($student);
        $this->showEditModal = true;
        $this->NationalityID = $NationalityID;
        $this->nati_id = $Nationality->nati_id;
        $this->nati_en_short_name = $Nationality->nati_en_short_name;
        $this->nationality = $Nationality->nationality;
        
       
		$this->dispatchBrowserEvent('show-form');
	}
    public function updatingNationalityIsActive($value,$NationalityIsActive)
    {
        //   dd($NationalityIsActive);
       if ($value) {
        $updatingNationalityIsActive = Nationality::find($value);
       
        $updatingNationalityIsActive->update(['nationaliti_isActive' => $NationalityIsActive,]);
       
        $this->emit('updatedNationalityIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }

    public function updateNationalityForm()
    {
    
        try{
            if ($this->nati_id) {
                $updatingLanguage = Nationality::find($this->nati_id);

            
                $updatingLanguage->update([
                    'nati_en_short_name'  			=>  $this->nati_en_short_name,
                    'nationality'  			=>  $this->nationality,
                
                ]);
               
                $this->emit('updatedNationalityIsActive');
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

    public function confirmNationalityRemoval($NationalityID)
	{
		$this->NationalityBeingRemoved = $NationalityID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyNationlity()
	{
		$deleteNationality = Nationality::findOrFail($this->NationalityBeingRemoved);

		$deleteNationality->delete();
        $this->emit('deletedNationalityForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}
    public function render()
    {
        return view('livewire.nationality.create-nationality-form');
    }
}
