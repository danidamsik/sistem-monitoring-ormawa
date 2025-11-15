<?php

namespace App\Livewire\Edit;

use Livewire\Component;

class EditKegiatan extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.edit.edit-kegiatan');
    }
}
