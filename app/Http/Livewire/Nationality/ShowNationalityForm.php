<?php

namespace App\Http\Livewire\Nationality;

use App\Models\Nationality;
use Livewire\Component;

class ShowNationalityForm extends Component
{
    public $nationalities;

    protected $listeners = [
        'createdNationalityForm'        => 'getNationalityList',
        'updatedNationalityForm'        => 'getNationalityList',
        'deletedNationalityForm'        => 'getNationalityList',
        'updatedNationalityIsActive'    => 'getNationalityList',
    ];

    public function getNationalityList()
    {
        $this->nationalities = Nationality::all();
    }
    public function render()
    {
        $this->getNationalityList();

        return view('livewire.nationality.show-nationality-form');
    }
}
