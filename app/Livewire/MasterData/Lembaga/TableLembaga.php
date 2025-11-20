<?php

namespace App\Livewire\MasterData\Lembaga;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class TableLembaga extends Component
{
    use WithPagination;

    public $id, $modal;

    public function delete()
    {
        DB::table('lembagas')->where('id', $this->id)->delete();
        $this->modal = false;
        $this->dispatch('success', message: "Lembaga Berhasil Dihapus!");
    }

    public function getLembagas()
    {
        return DB::table('lembagas')
            ->select('id', 'nama_lembaga', 'nomor_hp', 'email')
            ->orderBy('created_at', 'desc')->paginate(5); 
    }
    #[On('success')]
    public function render()
    {
        return view('livewire.master-data.lembaga.table-lembaga', [
            'lembaga' => $this->getLembagas()
        ]);
    }
}