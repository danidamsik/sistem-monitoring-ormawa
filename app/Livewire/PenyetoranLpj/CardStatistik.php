<?php
namespace App\Livewire\PenyetoranLpj;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CardStatistik extends Component
{
    public function getCardStatistik()
    {
        return DB::table('lpjs')
            ->selectRaw("
                COUNT(*) as total_terdaftar,
                SUM(CASE WHEN status_lpj = 'Belum Disetor' THEN 1 ELSE 0 END) as belum_disetor,
                SUM(CASE WHEN status_lpj = 'Menunggu Diperiksa' THEN 1 ELSE 0 END) as menunggu_pemeriksaan,
                SUM(CASE WHEN status_lpj = 'Di Setujui' THEN 1 ELSE 0 END) as sudah_disetujui
            ")
            ->first();
    }
    
    public function render()
    {
        return view('livewire.penyetoran-lpj.card-statistik', [
            'statistik' => $this->getCardStatistik()
        ]);
    }
}