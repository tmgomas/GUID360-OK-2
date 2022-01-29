<?php

namespace App\Http\Livewire\City;

use App\Models\City;
use Livewire\Component;

class ShowCityForm extends Component
{
    public $cities;

    protected $listeners = [
        'createdCityForm'        => 'getCityList',
        'updatedCityForm'        => 'getCityList',
        'deletedCityForm'        => 'getCityList',
        'updatedCityIsActive'    => 'getCityList',
    ];


    public function getCityList()
    {
        $this->cities = City::all();
    }

    public function render()
    {
        $this->getCityList();
        return view('livewire.city.show-city-form');
    }
}
