<?php

namespace App\Livewire\PelaksanaanKegiatan;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableKegiatan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    
    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getPelaksanaanData()
    {
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
                'pelaksanaans.status',
                'pelaksanaans.tenggat_lpj'
            )
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
        return match($status) {
            'belum_dimulai' => [
                'class' => 'bg-gray-100 text-gray-700',
                'label' => 'Belum Dimulai'
            ],
            'sedang_berlangsung' => [
                'class' => 'bg-blue-100 text-blue-700',
                'label' => 'Sedang Berlangsung'
            ],
            'selesai' => [
                'class' => 'bg-green-100 text-green-700',
                'label' => 'Selesai'
            ],
            default => [
                'class' => 'bg-gray-100 text-gray-700',
                'label' => 'Unknown'
            ]
        };
    }

    public function render()
    {
        return view('livewire.pelaksanaan-kegiatan.table-kegiatan', [
            'pelaksanaans' => $this->getPelaksanaanData()
        ]);
    }
}