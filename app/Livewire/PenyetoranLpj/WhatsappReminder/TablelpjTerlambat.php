<?php

namespace App\Livewire\PenyetoranLpj\WhatsappReminder;

use Livewire\Component;
use App\Models\Pelaksanaan;
use Livewire\WithPagination;

class TablelpjTerlambat extends Component
{
    use WithPagination;
    
    public function getlpjTerlambat()
    {
        return Pelaksanaan::whereHas('lpj', function ($query) {
            $query->where('status_lpj', 'Belum Disetor');
        })
            ->where('tanggal_selesai', '<=', now()->subWeek())
            ->with(['lpj', 'proposal.lembaga'])
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.penyetoran-lpj.whatsapp-reminder.tablelpj-terlambat', ['lpjTerlambat' => $this->getlpjTerlambat()]);
    }
}
