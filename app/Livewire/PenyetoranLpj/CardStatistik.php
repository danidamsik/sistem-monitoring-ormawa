<?php
namespace App\Livewire\PenyetoranLpj;

use App\Models\Lpj;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CardStatistik extends Component
{
    public $total_lpj, $belum_disetor, $menunggu_pemeriksaan, $sudah_disetujui;

    public function mount()
    {
        $statistik = Lpj::join('pelaksanaans', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->join('proposals', 'proposals.id', '=', 'pelaksanaans.proposal_id')
            ->whereNotNull('proposals.dana_disetujui')
            ->where('proposals.dana_disetujui', '>', 0)
            ->where('pelaksanaans.status', 'selesai')
            ->select('lpjs.status_lpj', DB::raw('COUNT(*) as total'))
            ->groupBy('lpjs.status_lpj')
            ->pluck('total', 'status_lpj');

        $this->total_lpj = $statistik->sum();
        $this->belum_disetor = $statistik->get('Belum Disetor', 0);
        $this->menunggu_pemeriksaan = $statistik->get('Menunggu Diperiksa', 0);
        $this->sudah_disetujui = $statistik->get('Di Setujui', 0);
    }

    public function render()
    {
        return view('livewire.penyetoran-lpj.card-statistik');
    }
}