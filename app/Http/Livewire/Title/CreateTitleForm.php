<?php

namespace App\Http\Livewire\Title;

use App\Models\Title;
use Livewire\Component;

class CreateTitleForm extends Component
{
    public $titles_isActive = true;
    public $titles_id,$titles_name;
    public $showEditModal = false;
    protected $listeners = [
        'newForm', 
        'updateTitle',
        'confirmTitleRemoval'    => 'confirmTitleRemoval',
        'deleteConfirmed'       => 'destroyTitle',
        'updatingTitleIsActive'  => 'updatingTitleIsActive',
    ];
   
    private function resetInput()
    {
        $this->titles_name                     = null;
       
    }
    public function newForm()
    {
        $this->showEditModal = false;
        $this->resetInput();
		$this->dispatchBrowserEvent('show-form');
    }

    public function createTitleForm()
    {
        $this->validate([
            'titles_name'      => 'required',
            
        ]);

        try{
            $user = Title::create([
                'titles_name'  			=>  $this->titles_name,
				
            ]);

           
			$this->emit('createdTitleForm');
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

    public function updateTitle($TitleID)
	{
        $Title = Title::findOrFail($TitleID);
        // dd($student);
        $this->showEditModal = true;
        $this->Title = $Title;
        $this->titles_id = $Title->titles_id;
        $this->titles_name = $Title->titles_name;
        
       
		$this->dispatchBrowserEvent('show-form');
	}
    public function updatingTitleIsActive($value,$TitleIsActive)
    {
        //   dd($TitleIsActive);
       if ($value) {
        $updatingTitleIsActive = Title::find($value);
       
        $updatingTitleIsActive->update(['titles_isActive' => $TitleIsActive,]);
       
        $this->emit('updatedTitleIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }
    public function updateTitleForm()
    {
    
        try{
            if ($this->titles_id) {
                $updatingLanguage = Title::find($this->titles_id);

            
                $updatingLanguage->update([
                    'titles_name'  			=>  $this->titles_name,
                
                ]);
               
                $this->emit('updatedTitleForm');
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

    public function confirmTitleRemoval($TitleID)
	{
		$this->TitleBeingRemoved = $TitleID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyTitle()
	{
		$deleteTitle = Title::findOrFail($this->TitleBeingRemoved);

		$deleteTitle->delete();
        $this->emit('deletedTitleForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}

    public function render()
    {
        return view('livewire.title.create-title-form');
    }
}
