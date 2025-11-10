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

    public function loadPendingLpjs()
    {
        $today = Carbon::now();

        $this->pendingLpjs = DB::table('lpjs')
            ->join('pelaksanaans', 'lpjs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->select(
                'lpjs.id',
                'proposals.nama_kegiatan',
                'lembagas.nama_lembaga',
                'pelaksanaans.tenggat_lpj',
                'lpjs.status_lpj'
            )
            ->where('lpjs.status_lpj', 'Belum Disetor')
            ->whereNotNull('pelaksanaans.tenggat_lpj')
            ->orderBy('pelaksanaans.tenggat_lpj', 'asc')
            ->limit($this->limit)
            ->get()
            ->map(function ($lpj) use ($today) {
                $tenggat = Carbon::parse($lpj->tenggat_lpj);
                $daysRemaining = $today->diffInDays($tenggat, false);

                // Hitung sisa waktu
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

                // Tentukan status prioritas dan badge
                $lpj->priority = $this->determinePriority($daysRemaining);

                // Format tanggal tenggat
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
            // Mendesak (3 hari atau kurang)
            return [
                'text' => 'Mendesak',
                'class' => 'bg-red-100 text-red-800'
            ];
        } elseif ($daysRemaining <= 7) {
            // Prioritas (4-7 hari)
            return [
                'text' => 'Prioritas',
                'class' => 'bg-yellow-100 text-yellow-800'
            ];
        } else {
            // Normal (lebih dari 7 hari)
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
