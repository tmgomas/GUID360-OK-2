<?php

namespace App\Http\Livewire\Province;

use App\Models\Country;
use App\Models\Province;
use Livewire\Component;

class CreateProvinceForm extends Component
{
    public $pro_isActive = true;
    public $pro_id,$pro_country_id,$pro_name_en,$pro_name_si,$pro_name_ta;
    public $showEditModal = false;
    public $Countries;

    protected $listeners = [
        'newForm', 
        'updateProvince',
        'confirmProvinceRemoval'     => 'confirmProvinceRemoval',
        'deleteConfirmed'          => 'destroyPtovince',
        'updatingProvinceIsActive'  => 'updatingProvinceIsActive',
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
    public function createProvinceForm()
    {
        $this->validate([
            'pro_country_id'      => 'required',
            'pro_name_en'      => 'required',
            
        ]);

        try{
            $province = Province::create([
                'pro_country_id'  		=>  $this->pro_country_id,
                'pro_name_en'  			=>  $this->pro_name_en,
                'pro_name_si'  			=>  $this->pro_name_si,
                'pro_name_ta'  			=>  $this->pro_name_ta,
				
            ]);

           
			$this->emit('createdProvinceForm');
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

    public function updateProvince($ProvinceID)
	{
        $Province = Province::findOrFail($ProvinceID);
        // dd($student);
        $this->showEditModal = true;
        $this->Province = $Province;
        $this->pro_id = $Province->pro_id;
        $this->pro_country_id = $Province->pro_country_id;
        $this->pro_name_en = $Province->pro_name_en;
        $this->pro_name_si = $Province->pro_name_si;
        $this->pro_name_ta = $Province->pro_name_ta;
        
       
		$this->dispatchBrowserEvent('show-form');
	}

    public function updatingProvinceIsActive($value,$ProvinceIsActive)
    {
        //   dd($TitleIsActive);
       if ($value) {
        $updatingProvince = Province::find($value);
       
        $updatingProvince->update(['pro_isActive' => $ProvinceIsActive,]);
       
        $this->emit('updatedProvinceIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }

    public function updateProvinceForm()
    {
    
        try{
            if ($this->pro_id) {
                $updatingProvince = Province::find($this->pro_id);
            
                $updatingProvince->update([
                    'pro_country_id'  			=>  $this->pro_country_id,
                    'pro_name_en'  			=>  $this->pro_name_en,
                    'pro_name_si'  			=>  $this->pro_name_si,
                    'pro_name_ta'  			=>  $this->pro_name_ta,
                ]);
               
                $this->emit('updatedProvinceForm');
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
    public function confirmProvinceRemoval($deleteProvinceID)
	{
		$this->PtovinceBeingRemoved = $deleteProvinceID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

	public function destroyPtovince()
	{
		$deleteProvince = Province::findOrFail($this->PtovinceBeingRemoved);

		$deleteProvince->delete();
        $this->emit('deletedProvinceForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function getCountryList()
    {
        $this->Countries = Country::all();
    }

    public function render()
    {
        $this->getCountryList();
        return view('livewire.province.create-province-form');
    }
}
