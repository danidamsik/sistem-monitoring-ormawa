<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendingLpj extends Component
{
    public $pendingLpjs;
    public $limit = 4;
    
    public function mount()
    {
        $this->loadPendingLpjs();
    }
    
    public function updatedLimit()
    {
        $this->loadPendingLpjs();
    }
    
    public function loadPendingLpjs()
    {
        $today = Carbon::now();
        $todayString = Carbon::today()->toDateString();
        
        $this->pendingLpjs = DB::table('lpjs')
            ->join('pelaksanaans', 'lpjs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->select(
                'lpjs.id',
                'proposals.nama_kegiatan',
                'lembagas.nama_lembaga',
                'pelaksanaans.tanggal_selesai',
                'lpjs.status_lpj'
            )
            ->where('lpjs.status_lpj', 'Belum Disetor')
            ->whereNotNull('proposals.dana_disetujui')
            ->where('proposals.dana_disetujui', '>', 0)
            ->where('pelaksanaans.tanggal_selesai', '<', $todayString)
            ->orderByRaw('DATE_ADD(pelaksanaans.tanggal_selesai, INTERVAL 1 WEEK) ASC')
            ->limit($this->limit)
            ->get()
            ->map(function ($lpj) use ($today) {
                $tenggat = Carbon::parse($lpj->tanggal_selesai)->addWeek();
                $daysRemaining = $today->diffInDays($tenggat, false);
                
                if ($daysRemaining < 0) {
                    $lpj->deadline_text = 'Terlambat ' . abs($daysRemaining) . ' hari';
                } elseif ($daysRemaining == 0) {
                    $lpj->deadline_text = 'Jatuh tempo: Hari ini';
                } elseif ($daysRemaining == 1) {
                    $lpj->deadline_text = 'Jatuh tempo: Besok';
                } elseif ($daysRemaining <= 7) {
                    $lpj->deadline_text = 'Jatuh tempo: ' . $daysRemaining . ' hari';
                } elseif ($daysRemaining <= 14) {
                    $weeks = ceil($daysRemaining / 7);
                    $lpj->deadline_text = 'Jatuh tempo: ' . $weeks . ' minggu';
                } else {
                    $lpj->deadline_text = 'Jatuh tempo: ' . $tenggat->format('d M Y');
                }
                
                $lpj->priority = $this->determinePriority($daysRemaining);
                $lpj->tenggat_formatted = $tenggat->format('d M Y');
                $lpj->days_remaining = $daysRemaining;
                
                return $lpj;
            });
    }
    
    private function determinePriority($daysRemaining)
    {
        if ($daysRemaining < 0) {
            // Terlambat
            return [
                'text' => 'Terlambat',
                'class' => 'bg-red-100 text-red-800'
            ];
        } elseif ($daysRemaining <= 3) {
            return [
                'text' => 'Mendesak',
                'class' => 'bg-red-100 text-red-800'
            ];
        } elseif ($daysRemaining <= 7) {
            return [
                'text' => 'Prioritas',
                'class' => 'bg-yellow-100 text-yellow-800'
            ];
        } else {
            return [
                'text' => 'Normal',
                'class' => 'bg-blue-100 text-blue-800'
            ];
        }
    }
    
    public function render()
    {
        return view('livewire.dashboard.pending-lpj');
    }
}