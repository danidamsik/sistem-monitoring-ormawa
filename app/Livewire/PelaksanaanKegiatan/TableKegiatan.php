<?php

namespace App\Livewire\PelaksanaanKegiatan;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TableKegiatan extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $modal = false;
    public $pelaksanaan_id;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getPelaksanaanData()
    {
        $today = Carbon::today()->toDateString();

        return DB::table('pelaksanaans')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->select(
                'pelaksanaans.id',
                'proposals.nama_kegiatan',
                'lembagas.nama_lembaga',
                'pelaksanaans.tanggal_mulai',
                'pelaksanaans.tanggal_selesai',
                'pelaksanaans.lokasi',
                'pelaksanaans.penanggung_jawab',
                DB::raw("CASE 
                WHEN pelaksanaans.tanggal_mulai > '{$today}' THEN 'belum_dimulai'
                WHEN pelaksanaans.tanggal_mulai <= '{$today}' AND pelaksanaans.tanggal_selesai >= '{$today}' THEN 'sedang_berlangsung'
                WHEN pelaksanaans.tanggal_selesai < '{$today}' THEN 'selesai'
            END as status")
            )
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->whereNotNull('proposals.dana_disetujui')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('proposals.nama_kegiatan', 'like', '%' . $this->search . '%')
                        ->orWhere('lembagas.nama_lembaga', 'like', '%' . $this->search . '%')
                        ->orWhere('pelaksanaans.lokasi', 'like', '%' . $this->search . '%')
                        ->orWhere('pelaksanaans.penanggung_jawab', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('pelaksanaans.tanggal_mulai', 'desc')
            ->paginate($this->perPage);
    }

    public function getStatusBadge($status)
    {
        return match ($status) {
            'belum_dimulai' => [
                'class' => 'text-gray-700',
                'label' => 'Belum Dimulai'
            ],
            'sedang_berlangsung' => [
                'class' => 'text-blue-700',
                'label' => 'Sedang Berlangsung'
            ],
            'selesai' => [
                'class' => 'text-green-700',
                'label' => 'Selesai'
            ],
            default => [
                'class' => 'text-gray-700',
                'label' => 'Unknown'
            ]
        };
    }

    public function delete()
    {
        DB::table('pelaksanaans')->where('id', $this->pelaksanaan_id)->delete();
        $this->modal = false;
        $this->dispatch('success', message: "Kegiatan Berhasil dihapus");
    }

    public function render()
    {
        return view('livewire.pelaksanaan-kegiatan.table-kegiatan', [
            'pelaksanaans' => $this->getPelaksanaanData()
        ]);
    }
}
