<?php

namespace App\Http\Livewire\Province;

use App\Models\Province;
use Livewire\Component;

class ShowProvinceForm extends Component
{
    public $Provinces;

    protected $listeners = [
        'createdProvinceForm'        => 'getProvinceList',
        'updatedProvinceForm'        => 'getProvinceList',
        'deletedProvinceForm'        => 'getProvinceList',
        'updatedProvinceIsActive'    => 'getProvinceList',
    ];
    public function getProvinceList()
    {
        $this->Provinces = Province::all();
    }

    public function render()
    {
        $this->getProvinceList();
        return view('livewire.province.show-province-form');
    }
}
