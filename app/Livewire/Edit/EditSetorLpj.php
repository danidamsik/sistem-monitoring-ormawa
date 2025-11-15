<?php

namespace App\Livewire\Edit;

use Livewire\Component;

class EditSetorLpj extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.edit.edit-setor-lpj');
    }
}
