<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TopCard extends Component
{
    public $totalProposal;
    public $proposalBaru;
    public $menungguLpj;
    public $lpjTersetor;
    public $lpjBulanIni;

    public function mount()
    {
        $this->calculateStats();
    }

    public function calculateStats()
    {
        $this->totalProposal = DB::table('proposals')->count();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $this->proposalBaru = DB::table('proposals')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $statistik = DB::table('lpjs')
            ->join('pelaksanaans', 'lpjs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->where('pelaksanaans.status', 'selesai')
            ->whereNotNull('proposals.dana_disetujui')
            ->where('proposals.dana_disetujui', '>', 0)
            ->whereIn('lpjs.status_lpj', ['Belum Disetor', 'Di Setujui'])
            ->select('lpjs.status_lpj', DB::raw('COUNT(*) as total'))
            ->groupBy('lpjs.status_lpj')
            ->pluck('total', 'status_lpj');

        $this->menungguLpj = $statistik->get('Belum Disetor', 0);
        $this->lpjTersetor = $statistik->get('Di Setujui', 0);

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $this->lpjBulanIni = DB::table('lpjs')
            ->join('pelaksanaans', 'lpjs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->where('lpjs.status_lpj', 'Di Setujui')
            ->where('pelaksanaans.status', 'selesai')
            ->whereNotNull('proposals.dana_disetujui')
            ->where('proposals.dana_disetujui', '>', 0)
            ->whereBetween('lpjs.tanggal_disetor', [$startOfMonth, $endOfMonth])
            ->count();
    }

    public function render()
    {
        return view('livewire.dashboard.top-card');
    }
}
