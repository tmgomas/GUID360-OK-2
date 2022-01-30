<?php

namespace App\Http\Livewire\Language;

use App\Models\Language;
use Livewire\Component;

class CreateLanguageForm extends Component
{
    public $lang_isActive = true;
    public $language_id, $lang_name,$lang_iso;
    public $showEditModal = false;
    

    protected $listeners = [
        'newForm', 
        'updateLanguage',
        'confirmLanguageRemoval'    => 'confirmLanguageRemoval',
        'deleteConfirmed'       => 'destroyLanguage',
        'updatingLanguageIsActive'  => 'updatingLanguageIsActive',
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

    public function createLanguageForm()
    {
        $this->validate([
            'lang_name'      => 'required',
            
        ]);

        try{
            $user = Language::create([
                'lang_name'  			=>  $this->lang_name,
				'lang_iso'  			=>  $this->lang_iso,
            ]);

           
			$this->emit('createdLanguageForm');
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

    public function updateLanguage($LanguageID)
	{
        $Language = Language::findOrFail($LanguageID);
        // dd($student);
        $this->showEditModal = true;
        $this->Language = $Language;
        $this->language_id = $Language->language_id;
        $this->lang_name = $Language->lang_name;
        $this->lang_iso = $Language->lang_iso;
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $roles->roles->pluck('name','name')->all();
        
        // $User->assignRole('Admin');
		$this->dispatchBrowserEvent('show-form');
	}
    public function updatingLanguageIsActive($value,$LanguageIsActive)
    {
        //   dd($LanguageIsActive);
       if ($value) {
        $updatingLanguageisActive = Language::find($value);
       
        $updatingLanguageisActive->update(['lang_isActive' => $LanguageIsActive,]);
       
        $this->emit('updatedLanguageIsActive');
        $this->dispatchBrowserEvent('hide-form',[
            'type'=>'success',
            'message'=>"IsActive Update Successfully!!"
            
        ]);
    }
    }
    public function updateLanguageForm()
    {
    
        try{
            if ($this->language_id) {
                $updatingLanguage = Language::find($this->language_id);

            
                $updatingLanguage->update([
                    'lang_name'  			=>  $this->lang_name,
                    'lang_iso'  			=>  $this->lang_iso,
                ]);
               
                $this->emit('updatedLanguageForm');
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
    public function confirmLanguageRemoval($LanguageID)
	{
		$this->LanguageBeingRemoved = $LanguageID;
		$this->dispatchBrowserEvent('show-delete-confirmation');
	}

    
	public function destroyLanguage()
	{
		$feeGroup = Language::findOrFail($this->LanguageBeingRemoved);

		$feeGroup->delete();
        $this->emit('deletedLanguageForm');
		$this->dispatchBrowserEvent('deleted', ['message' => 'User deleted successfully!']);
	}
    public function render()
    {
        return view('livewire.language.create-language-form');
    }
}
