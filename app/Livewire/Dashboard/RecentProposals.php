<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RecentProposals extends Component
{
    public $recentProposals;
    public $limit = 5; // Tambahkan nilai default

    public function mount()
    {
        $this->loadRecentProposals();
    }

    // Method ini akan dipanggil otomatis saat $limit berubah
    public function updatedLimit()
    {
        $this->loadRecentProposals();
    }

    public function loadRecentProposals()
    {
        $this->recentProposals = DB::table('proposals')
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->leftJoin('pelaksanaans', 'proposals.id', '=', 'pelaksanaans.proposal_id')
            ->leftJoin('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->select(
                'proposals.id',
                'proposals.nama_kegiatan',
                'proposals.created_at',
                'lembagas.nama_lembaga',
                'lpjs.status_lpj',
                'pelaksanaans.tanggal_mulai'
            )
            ->orderBy('proposals.created_at', 'desc')
            ->limit($this->limit)
            ->get()
            ->map(function ($proposal) {
                $proposal->time_ago = Carbon::parse($proposal->created_at)->locale('id')->diffForHumans();
                $proposal->status = $this->determineStatus($proposal);

                return $proposal;
            });
    }

    private function determineStatus($proposal)
    {
        if ($proposal->status_lpj === 'Sudah Disetor') {
            return [
                'text' => 'Selesai',
                'class' => 'bg-green-100 text-green-800'
            ];
        } elseif ($proposal->status_lpj === 'Belum Disetor' && $proposal->tanggal_mulai) {
            $tanggalMulai = Carbon::parse($proposal->tanggal_mulai);
            if ($tanggalMulai->isPast()) {
                return [
                    'text' => 'Menunggu LPJ',
                    'class' => 'bg-yellow-100 text-yellow-800'
                ];
            } else {
                return [
                    'text' => 'Disetujui',
                    'class' => 'bg-green-100 text-green-800'
                ];
            }
        } elseif ($proposal->tanggal_mulai) {
            return [
                'text' => 'Disetujui',
                'class' => 'bg-green-100 text-green-800'
            ];
        } else {
            return [
                'text' => 'Diajukan',
                'class' => 'bg-blue-100 text-blue-800'
            ];
        }
    }

    public function render()
    {
        return view('livewire.dashboard.recent-proposals');
    }
}