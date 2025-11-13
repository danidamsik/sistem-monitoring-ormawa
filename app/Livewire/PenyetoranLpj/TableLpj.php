<?php

namespace App\Livewire\PenyetoranLpj;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TableLpj extends Component
{
    public function getListLpj()
    {
        return DB::table('proposals')
        ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
        ->join('pelaksanaans', 'proposals.id', '=', 'pelaksanaans.proposal_id')
        ->join('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
        ->select(
            'proposals.nama_kegiatan',
            'lembagas.nama_lembaga',
            'pelaksanaans.tanggal_selesai',
            'pelaksanaans.tenggat_lpj',
            'lpjs.tanggal_disetor',
            'lpjs.status_lpj',
            'lpjs.diperiksa_spi'
        )->get();
    }
    
    public function render()
    {
        return view('livewire.penyetoran-lpj.table-lpj', ['listLpj' => $this->getListLpj()]);
    }
}
