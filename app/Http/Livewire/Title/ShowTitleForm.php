<?php

namespace App\Http\Livewire\Title;

use App\Models\Title;
use Livewire\Component;

class ShowTitleForm extends Component
{
    protected $listeners = [
        'createdTitleForm'        => 'getTitleList',
        'updatedTitleForm'        => 'getTitleList',
        'deletedTitleForm'        => 'getTitleList',
        'updatedTitleIsActive'    => 'getTitleList',
    ];

    public function getTitleList()
    {
        $this->Titles = Title::all();
    }
    public function render()
    {
        $this->getTitleList();
        return view('livewire.title.show-title-form');
    }
}
