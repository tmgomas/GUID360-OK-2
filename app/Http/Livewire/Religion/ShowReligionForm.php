<?php

namespace App\Http\Livewire\Religion;

use App\Models\Religion;
use Livewire\Component;

class ShowReligionForm extends Component
{
    public $Religions;

    protected $listeners = [
        'CreatedReligionForm'        => 'getReligionList',
        'updatedReligionForm'        => 'getReligionList',
        'deletedReligionForm'        => 'getReligionList',
        'updatedReligionIsActive'    => 'getReligionList',
    ];

    public function getReligionList()
    {
        $this->Religions = Religion::all();
    }
    public function render()
    {
        $this->getReligionList();
        return view('livewire.religion.show-religion-form');
    }
}
