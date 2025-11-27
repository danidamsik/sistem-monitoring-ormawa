<?php
namespace App\Livewire\PelaksanaanKegiatan;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CardSummary extends Component
{
    public $totalKegiatan = 0;
    public $sedangBerlangsung = 0;
    public $belumSetorLpj = 0;
    public $sudahSetorLpj = 0;
    
    public function mount()
    {
        $this->loadSummaryData();
    }
    
    public function loadSummaryData()
    {
        $today = Carbon::today()->toDateString();
        
        // Stats Pelaksanaan
        $pelaksanaanStats = DB::table('pelaksanaans')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->select(
                DB::raw('COUNT(*) as total'),
                DB::raw("SUM(CASE 
                    WHEN pelaksanaans.tanggal_mulai <= '{$today}' 
                    AND pelaksanaans.tanggal_selesai >= '{$today}' 
                    THEN 1 
                    ELSE 0 
                END) as sedang_berlangsung")
            )
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->whereNotNull('proposals.dana_disetujui')
            ->first();
        
        $this->totalKegiatan = $pelaksanaanStats->total;
        $this->sedangBerlangsung = $pelaksanaanStats->sedang_berlangsung;
        
        $lpjStats = DB::table('lpjs')
            ->join('pelaksanaans', 'lpjs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->where('pelaksanaans.tanggal_selesai', '<', $today)
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->whereNotNull('proposals.dana_disetujui')
            ->select(
                DB::raw("SUM(CASE WHEN status_lpj = 'Belum Disetor' THEN 1 ELSE 0 END) as belum_disetor"),
                DB::raw("SUM(CASE WHEN status_lpj = 'Di Setujui' THEN 1 ELSE 0 END) as sudah_disetor")
            )->first();
        
        $this->belumSetorLpj = $lpjStats->belum_disetor ?? 0;
        $this->sudahSetorLpj = $lpjStats->sudah_disetor ?? 0;
    }
    
    public function render()
    {
        return view('livewire.pelaksanaan-kegiatan.card-summary');
    }
}