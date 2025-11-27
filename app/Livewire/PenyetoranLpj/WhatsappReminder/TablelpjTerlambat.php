<?php
namespace App\Livewire\PenyetoranLpj\WhatsappReminder;

use Livewire\Component;
use App\Models\Pelaksanaan;
use Livewire\WithPagination;
use Carbon\Carbon;

class TablelpjTerlambat extends Component
{
    use WithPagination;
    
    public $search = '';
    public $lembagaFilter = '';
    
    protected $updatesQueryString = ['search', 'lembagaFilter'];
    
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function updatedLembagaFilter()
    {
        $this->resetPage();
    }
    
    public function getlpjTerlambat()
    {
        $weekAgo = Carbon::today()->subWeek()->toDateString();
        
        return Pelaksanaan::whereHas('lpj', function ($query) {
                $query->where('status_lpj', 'Belum Disetor');
            })
            ->whereHas('proposal', function ($query) {
                $query->whereNotNull('dana_disetujui')
                    ->where('dana_disetujui', '>', 0);
            })
            // ✅ Hapus kondisi status, hanya gunakan logika tanggal
            ->where('tanggal_selesai', '<=', $weekAgo)
            ->when($this->search, function ($q) {
                $q->whereHas('proposal', function ($p) {
                    $p->where('nama_kegiatan', 'like', "%{$this->search}%")
                        ->orWhereHas('lembaga', function ($l) {
                            $l->where('nama_lembaga', 'like', "%{$this->search}%");
                        });
                });
            })
            ->when($this->lembagaFilter, function ($q) {
                $q->whereHas('proposal.lembaga', function ($l) {
                    $l->where('id', $this->lembagaFilter);
                });
            })
            ->with(['lpj', 'proposal.lembaga'])
            ->paginate(10);
    }
    
    public function getLembagaList()
    {
        $weekAgo = Carbon::today()->subWeek()->toDateString();
        
        return Pelaksanaan::whereHas('lpj', function ($query) {
                $query->where('status_lpj', 'Belum Disetor');
            })
            ->whereHas('proposal', function ($query) {
                $query->whereNotNull('dana_disetujui')
                    ->where('dana_disetujui', '>', 0);
            })
            // ✅ Hapus kondisi status, hanya gunakan logika tanggal
            ->where('tanggal_selesai', '<=', $weekAgo)
            ->with('proposal.lembaga')
            ->get()
            ->pluck('proposal.lembaga')
            ->filter() 
            ->unique('id')
            ->values(); 
    }
    
    public function render()
    {
        return view('livewire.penyetoran-lpj.whatsapp-reminder.tablelpj-terlambat', [
            'lpjTerlambat' => $this->getlpjTerlambat(),
            'lembagaList'  => $this->getLembagaList(),
        ]);
    }
}