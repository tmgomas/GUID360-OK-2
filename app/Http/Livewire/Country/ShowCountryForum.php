<?php

namespace App\Http\Livewire\Country;

use App\Models\Country;
use Livewire\Component;

class ShowCountryForum extends Component
{
    public $countries;

    protected $listeners = [
        'createdCountryForm'        => 'getCountryList',
        'updatedCountryForm'        => 'getCountryList',
        'deletedCountryForm'        => 'getCountryList',
        'updatedCountryIsActive'    => 'getCountryList',
    ];

    public function getCountryList()
    {
        $this->countries = Country::all();
    }
    public function render()
    {
        $this->getCountryList();
        return view('livewire.country.show-country-forum');
    }
}
