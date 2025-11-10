<?php
namespace App\Livewire\PengajuanProposal;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TopCard extends Component
{
    public $totalProposal;
    public $menungguPersetujuan;
    public $disetujui;
    public $totalDanaDisetujui;

    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        // Total Proposal
        $this->totalProposal = DB::table('proposals')->count();

        // Menunggu Persetujuan (dana_disetujui masih NULL)
        $this->menungguPersetujuan = DB::table('proposals')
            ->whereNull('dana_disetujui')
            ->count();

        // Disetujui (dana_disetujui tidak NULL)
        $this->disetujui = DB::table('proposals')
            ->whereNotNull('dana_disetujui')
            ->count();

        // Total Dana Disetujui
        $totalDana = DB::table('proposals')
            ->whereNotNull('dana_disetujui')
            ->sum('dana_disetujui');
        
        $this->totalDanaDisetujui = $this->formatRupiah($totalDana);
    }

    private function formatRupiah($angka)
    {
        if ($angka >= 1000000000) {
            // Milyar
            return 'Rp ' . number_format($angka / 1000000000, 1, ',', '.') . ' M';
        } elseif ($angka >= 1000000) {
            // Juta
            return 'Rp ' . number_format($angka / 1000000, 0, ',', '.') . ' Jt';
        } elseif ($angka >= 1000) {
            // Ribu
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