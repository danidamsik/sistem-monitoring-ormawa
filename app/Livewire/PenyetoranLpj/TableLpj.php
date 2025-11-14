<?php

namespace App\Livewire\PenyetoranLpj;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableLpj extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'tailwind';
    public $modal = false;
    public $lpj_id;

    public function delete()
    {
        DB::table('lpjs')->where('id', $this->lpj_id)->delete();
        $this->modal = false;
        $this->dispatch('success', message: "Lpj berhasil dihapus!");
    }

    public function getListLpj()
    {
        return DB::table('proposals')
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->join('pelaksanaans', 'proposals.id', '=', 'pelaksanaans.proposal_id')
            ->join('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->select(
                'lpjs.id',
                'proposals.nama_kegiatan',
                'lembagas.nama_lembaga',
                'pelaksanaans.tanggal_selesai',
                'pelaksanaans.tenggat_lpj',
                'lpjs.tanggal_disetor',
                'lpjs.status_lpj',
                'lpjs.diperiksa_spi'
            )
            ->orderBy('lpjs.created_at', 'desc')
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.penyetoran-lpj.table-lpj', [
            'listLpj' => $this->getListLpj(),
        ]);
    }
}
