<?php

namespace App\Http\Livewire\Gender;

use App\Models\Gender;
use Livewire\Component;

class ShowGenderForm extends Component
{
    public $Genders;

    protected $listeners = [
            'CreatedGenderForm'        => 'getGenderList',
            'updatedGenderForm'        => 'getGenderList',
            'deletedGenderForm'        => 'getGenderList',
            'updatedGenderIsActive'    => 'getGenderList',
        ];
        public function getGenderList()
        {
            $this->Genders = Gender::all();
        }
        public function render()
        {
            $this->getGenderList();
        return view('livewire.gender.show-gender-form');
    }
}
