<?php

namespace App\Http\Livewire\District;

use App\Models\District;
use App\Models\Province;
use Livewire\Component;

class CreateDistrictForm extends Component
{
    public $dist_isActive = true;
    public $dist_id,$dist_pro_id,$dist_name_en,$dist_name_si,$dist_name_ta;
    public $showEditModal = false;
    public $provinces;
    protected $listeners = [
        'newForm', 
        'updateDistrict',
        'confirmDistricteRemoval'     => 'confirmDistricteRemoval',
        'deleteConfirmed'          => 'destroyDistrict',
        'updatingDistrictIsActive'  => 'updatingDistrictIsActive',
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
    public function createDistrictForm()
    {
        $this->validate([
            'dist_pro_id'      => 'required',
            'dist_name_en'      => 'required',
            
        ]);

        try{
            $user = District::create([
                'dist_pro_id'  			=>  $this->dist_pro_id,
                'dist_name_en'  			=>  $this->dist_name_en,
                'dist_name_si'  			=>  $this->dist_name_si,
                'dist_name_ta'  			=>  $this->dist_name_ta,
				
            ]);

           
			$this->emit('createdDistrictForm');
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

    public function updateDistrict($DistrictID)
	{
        $District = District::findOrFail($DistrictID);
        // dd($student);
        $this->showEditModal = true;
        $this->District = $District;
        $this->dist_id = $District->dist_id;
        $this->dist_pro_id = $District->dist_pro_id;
        $this->dist_name_en = $District->dist_name_en;
        $this->dist_name_si = $District->dist_name_si;
        $this->dist_name_ta = $District->dist_name_ta;
        
       
		$this->dispatchBrowserEvent('show-form');
	}

    public function updatingDistrictIsActive($value,$DistrictIsActive)
    {
        //   dd($TitleIsActive);
       if ($value) {
        $updatingDistrict = District::find($value);
       
        $updatingDistrict->update(['dist_isActive' => $DistrictIsActive,]);
       
        $this->emit('updatedDistrictIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }
    public function updateDistrictForm()
    {
    
        try{
            if ($this->dist_id) {
                $updatingDistrict = District::find($this->dist_id);
            
                $updatingDistrict->update([
                'dist_pro_id'  			    =>  $this->dist_pro_id,
                'dist_name_en'  			=>  $this->dist_name_en,
                'dist_name_si'  			=>  $this->dist_name_si,
                'dist_name_ta'  			=>  $this->dist_name_ta,
                ]);
               
                $this->emit('updatedDistrictForm');
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
    public function confirmDistricteRemoval($deleteDistrictID)
	{
		$this->DistrictBeingRemoved = $deleteDistrictID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

	public function destroyDistrict()
	{
		$deleteDistrict = District::findOrFail($this->DistrictBeingRemoved);

		$deleteDistrict->delete();
        $this->emit('deletedDistrictForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function getDistrictList()
    {
        $this->provinces = Province::all();
    }
    public function render()
    {
        $this->getDistrictList();
        return view('livewire.district.create-district-form');
    }
}
