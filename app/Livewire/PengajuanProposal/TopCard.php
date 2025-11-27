<?php
namespace App\Livewire\PengajuanProposal;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\DB;

class TopCard extends Component
{
    public $totalProposal;
    public $menungguPersetujuan;
    public $disetujui;
    public $totalDanaDisetujui;

    #[On('success')]
    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        $this->totalProposal = DB::table('proposals')->count();

        $this->menungguPersetujuan = DB::table('proposals')
            ->whereNull('dana_disetujui')
            ->count();

        $this->disetujui = DB::table('proposals')
            ->whereNotNull('dana_disetujui')->where('dana_disetujui', '>', 0)
            ->count();

        $totalDana = DB::table('proposals')
            ->whereNotNull('dana_disetujui')
            ->sum('dana_disetujui');
        
        $this->totalDanaDisetujui = $this->formatRupiah($totalDana);
    }

    
    private function formatRupiah($angka)
    {
        if ($angka >= 1000000000) {
            return 'Rp ' . number_format($angka / 1000000000, 1, ',', '.') . ' M';
        } elseif ($angka >= 1000000) {
            return 'Rp ' . number_format($angka / 1000000, 0, ',', '.') . ' Jt';
        } elseif ($angka >= 1000) {
            return 'Rp ' . number_format($angka / 1000, 0, ',', '.') . ' Rb';
        } else {
            return 'Rp ' . number_format($angka, 0, ',', '.');
        }
    }

    public function render()
    {
        return view('livewire.pengajuan-proposal.top-card');
    }
}