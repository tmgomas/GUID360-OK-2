<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Livewire\Component;

class CreateCountryForum extends Component
{

    public $coun_isActive = true;
    public $coun_id,$coun_name_en,$coun_code;
    public $showEditModal = false;

    protected $listeners = [
        'newForm', 
        'updateCountry',
        'confirmCountryRemoval'     => 'confirmCountryRemoval',
        'deleteConfirmed'          => 'destroyCountry',
        'updatingCountryIsActive'  => 'updatingCountryIsActive',
    ];
   
    
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }
    private function resetInput()
    {
        $this->coun_name_en                     = null;
        $this->coun_code                     = null;
       
    }
    public function createCountryForm()
    {
        $this->validate([
            'coun_name_en'      => 'required',
            'coun_code'      => 'required',
            
        ]);

        // try{
            $user = Country::create([
                'coun_name_en'  			=>  $this->coun_name_en,
                'coun_code'  			=>  $this->coun_code,
				
            ]);

           
			$this->emit('createdCountryForm');
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

    public function updateCountry($CountryID)
	{
        $Country = Country::findOrFail($CountryID);
        // dd($student);
        $this->showEditModal = true;
        $this->Country = $Country;
        $this->coun_id = $Country->coun_id;
        $this->coun_name_en = $Country->coun_name_en;
        $this->coun_code = $Country->coun_code;
        
       
		$this->dispatchBrowserEvent('show-form');
	}

    public function updatingCountryIsActive($value,$CountryIsActive)
    {
        //   dd($TitleIsActive);
       if ($value) {
        $updatingCountry = Country::find($value);
       
        $updatingCountry->update(['coun_isActive' => $CountryIsActive,]);
       
        $this->emit('updatedCountryIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }

    public function updateCountryForm()
    {
    
        try{
            if ($this->coun_id) {
                $updatingCountry = Country::find($this->coun_id);
            
                $updatingCountry->update([
                    'coun_name_en'  	    =>  $this->coun_name_en,
                    'coun_code'  			=>  $this->coun_code,
                ]);
               
                $this->emit('updatedCountryForm');
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

    public function confirmCountryRemoval($CountryID)
	{
		$this->CountryBeingRemoved = $CountryID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

	public function destroyCountry()
	{
		$deleteCountry = Country::findOrFail($this->CountryBeingRemoved);

		$deleteCountry->delete();
        $this->emit('deletedCountryForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function render()
    {
        return view('livewire.country.create-country-forum');
    }
}
