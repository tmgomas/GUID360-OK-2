<?php

namespace App\Http\Livewire\District;

use App\Models\District;
use Livewire\Component;

class ShowDistrictForm extends Component
{
    protected $listeners = [
        'createdDistrictForm'        => 'getDistrictList',
        'updatedDistrictForm'        => 'getDistrictList',
        'deletedDistrictForm'        => 'getDistrictList',
        'updatedDistrictIsActive'    => 'getDistrictList',
    ];

    public function getDistrictList()
    {
        $this->Districts = District::all();
    }
    public function render()
    {
        $this->getDistrictList();

        return view('livewire.district.show-district-form');
    }
}
