<?php

namespace App\Http\Livewire\City;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class CreateCityForm extends Component
{
    public $city_isActive = true;
    public $city_id,$city_dis_id,$city_name_en,$city_name_si,$city_name_ta,$postcode;
    public $showEditModal = false;
    public $districts;
    protected $listeners = [
        'newForm', 
        'updateCity',
        'confirmCityeRemoval'     => 'confirmCityeRemoval',
        'deleteConfirmed'          => 'destroyCity',
        'updatingCityIsActive'  => 'updatingCityIsActive',
    ];
   
    
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }
    private function resetInput()
    {
        $this->city_dis_id                     = null;
        $this->city_name_en                     = null;
       
    }

    public function createCityForm()
    {
        $this->validate([
            'city_dis_id'      => 'required',
            'city_name_en'      => 'required',
            
        ]);

        try{
            $user = City::create([
                'city_dis_id'  			=>  $this->city_dis_id,
                'city_name_en'  			=>  $this->city_name_en,
                'city_name_si'  			=>  $this->city_name_si,
                'city_name_ta'  			=>  $this->city_name_ta,
                'postcode'  			=>  $this->postcode,
				
            ]);

           
			$this->emit('createdCityForm');
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
    public function updateCity($CityID)
	{
        $City = City::findOrFail($CityID);
        // dd($student);
        $this->showEditModal = true;
        $this->City = $City;
        $this->city_id = $City->city_id;
        $this->city_dis_id = $City->city_dis_id;
        $this->city_name_en = $City->city_name_en;
        $this->city_name_si = $City->city_name_si;
        $this->city_name_ta = $City->city_name_ta;
        
       
		$this->dispatchBrowserEvent('show-form');
	}
    public function updatingCityIsActive($value,$CityIsActive)
    {
        //   dd($TitleIsActive);
       if ($value) {
        $updatingCity = City::find($value);
       
        $updatingCity->update(['city_isActive' => $CityIsActive,]);
       
        $this->emit('updatedCityIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }
    public function updateCityForm()
    {
    
        try{
            if ($this->city_id) {
                $updatingCity = City::find($this->city_id);
            
                $updatingCity->update([
                    'city_dis_id'  			=>  $this->city_dis_id,
                    'city_name_en'  			=>  $this->city_name_en,
                    'city_name_si'  			=>  $this->city_name_si,
                    'city_name_ta'  			=>  $this->city_name_ta,
                    'postcode'  			=>  $this->postcode,
                ]);
               
                $this->emit('updatedCityForm');
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
    public function confirmCityeRemoval($deleteCityID)
	{
		$this->CityBeingRemoved = $deleteCityID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

	public function destroyCity()
	{
		$deleteCity = City::findOrFail($this->CityBeingRemoved);

		$deleteCity->delete();
        $this->emit('deletedCityForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function getDistrictList()
    {
        $this->districts = District::all();
    }

    public function render()
    {
        $this->getDistrictList();
        return view('livewire.city.create-city-form');
    }
}
