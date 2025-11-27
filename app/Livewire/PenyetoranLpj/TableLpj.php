<?php

namespace App\Livewire\PenyetoranLpj;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableLpj extends Component
{
    use WithPagination;

    public function mount()
    {
        $this->createLpjForCompleted();
    }

    private function createLpjForCompleted()
    {
        $today = Carbon::today()->toDateString();

        $pelaksanaansWithoutLpj = DB::table('pelaksanaans')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->leftJoin('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->select('pelaksanaans.id')
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->whereNotNull('proposals.dana_disetujui')
            ->where('pelaksanaans.tanggal_selesai', '<', $today)
            ->whereNull('lpjs.id')
            ->get();

        if ($pelaksanaansWithoutLpj->isEmpty()) {
            return;
        }

        $lpjData = [];
        foreach ($pelaksanaansWithoutLpj as $pelaksanaan) {
            $lpjData[] = [
                'pelaksanaan_id' => $pelaksanaan->id,
                'status_lpj' => 'Belum Disetor',
                'tanggal_disetor' => null,
                'catatan_spi' => null,
            ];
        }

        if (!empty($lpjData)) {
            DB::table('lpjs')->insert($lpjData);
        }
    }

    public function getListLpj()
    {
        $today = Carbon::today()->toDateString();

        return DB::table('proposals')
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->join('pelaksanaans', 'proposals.id', '=', 'pelaksanaans.proposal_id')
            ->join('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->select(
                'lpjs.id',
                'proposals.nama_kegiatan',
                'lembagas.nama_lembaga',
                'pelaksanaans.tanggal_selesai',
                'lpjs.tanggal_disetor',
                'lpjs.status_lpj',
            )
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->whereNotNull('proposals.dana_disetujui')
            ->where('pelaksanaans.tanggal_selesai', '<', $today)
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
