<?php

namespace App\Http\Livewire\Language;

use App\Models\Language;
use Livewire\Component;

class ShowLanguageForm extends Component
{
    public $Languages;

    protected $listeners = [
        'createdNationalityForm'        => 'getNationalityList',
        'updatedNationalityForm'        => 'getNationalityList',
        'deletedNationalityForm'        => 'getNationalityList',
        'updatedNationalityIsActive'    => 'getNationalityList',
    ];
    public function render()
    {
        $this->Languages = Language::all();   
        return view('livewire.language.show-language-form');
    }
}
