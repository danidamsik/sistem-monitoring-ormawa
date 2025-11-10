<?php

namespace App\Livewire\PengajuanProposal;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TableProposal extends Component
{
    use WithPagination;

    public $search = '';
    public $filterLembaga = '';
    public $filterStatus = '';
    public $perPage = 10;

    protected $paginationTheme = 'tailwind';

    // Reset pagination saat filter berubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterLembaga()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function getProposals()
    {
        $query = DB::table('proposals')
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->join('users', 'proposals.user_id', '=', 'users.id')
            ->select(
                'proposals.*',
                'lembagas.nama_lembaga',
                'users.name as nama_user'
            );

        // Filter pencarian nama kegiatan
        if (!empty($this->search)) {
            $query->where('proposals.nama_kegiatan', 'like', '%' . $this->search . '%');
        }

        // Filter lembaga
        if (!empty($this->filterLembaga)) {
            $query->where('proposals.lembaga_id', $this->filterLembaga);
        }

        // Filter status
        if (!empty($this->filterStatus)) {
            if ($this->filterStatus === 'menunggu') {
                $query->whereNull('proposals.dana_disetujui');
            } elseif ($this->filterStatus === 'disetujui') {
                $query->whereNotNull('proposals.dana_disetujui')
                      ->where('proposals.dana_disetujui', '>', 0);
            } elseif ($this->filterStatus === 'ditolak') {
                $query->whereNotNull('proposals.dana_disetujui')
                      ->where('proposals.dana_disetujui', '=', 0);
            }
        }

        return $query->orderBy('proposals.tanggal_diterima', 'desc')
                     ->paginate($this->perPage);
    }

    public function getLembagas()
    {
        return DB::table('lembagas')
            ->select('id', 'nama_lembaga')
            ->orderBy('nama_lembaga', 'asc')
            ->get();
    }

    public function getStatusBadge($proposal)
    {
        if (is_null($proposal->dana_disetujui)) {
            return [
                'label' => 'Menunggu',
                'class' => 'bg-yellow-100 text-yellow-800'
            ];
        } elseif ($proposal->dana_disetujui > 0) {
            return [
                'label' => 'Disetujui',
                'class' => 'bg-green-100 text-green-800'
            ];
        } else {
            return [
                'label' => 'Ditolak',
                'class' => 'bg-red-100 text-red-800'
            ];
        }
    }

    public function delete($id)
    {
        try {
            DB::table('proposals')->where('id', $id)->delete();
            session()->flash('message', 'Proposal berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus proposal: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pengajuan-proposal.table-proposal', [
            'proposals' => $this->getProposals(),
            'lembagas' => $this->getLembagas()
        ]);
    }
}