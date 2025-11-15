<?php

namespace App\Livewire\PelaksanaanKegiatan;

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
        // Query untuk Total Kegiatan dan Sedang Berlangsung
        $pelaksanaanStats = DB::table('pelaksanaans')
            ->select(
                DB::raw('COUNT(*) as total'),
                DB::raw("SUM(CASE WHEN status = 'sedang_berlangsung' THEN 1 ELSE 0 END) as sedang_berlangsung")
            )
            ->first();

        $this->totalKegiatan = $pelaksanaanStats->total;
        $this->sedangBerlangsung = $pelaksanaanStats->sedang_berlangsung;

        // Query untuk LPJ
        $lpjStats = DB::table('lpjs')
            ->select(
                DB::raw("SUM(CASE WHEN status_lpj = 'Belum Disetor' THEN 1 ELSE 0 END) as belum_disetor"),
                DB::raw("SUM(CASE WHEN status_lpj = 'Di Setujui' THEN 1 ELSE 0 END) as sudah_disetor")
            )
            ->first();

        $this->belumSetorLpj = $lpjStats->belum_disetor ?? 0;
        $this->sudahSetorLpj = $lpjStats->sudah_disetor ?? 0;
    }

    public function render()
    {
        return view('livewire.pelaksanaan-kegiatan.card-summary');
    }
}