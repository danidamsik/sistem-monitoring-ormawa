<?php

namespace App\Livewire\Edit;

use Livewire\Component;

class EditProposal extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.edit.edit-proposal');
    }
}
