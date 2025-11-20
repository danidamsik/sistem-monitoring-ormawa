<?php

namespace App\Livewire\PenyetoranLpj\WhatsappReminder;

use Livewire\Component;
use App\Models\Pelaksanaan;

class TablelpjTerlambat extends Component
{
    public function getlpjTerlambat()
    {
        return Pelaksanaan::whereHas('lpj', function ($query) {
            $query->where('status_lpj', 'Belum Disetor');
        })
            ->where('tanggal_selesai', '<=', now()->subWeek())
            ->with(['lpj', 'proposal.lembaga'])
            ->get();
    }
    public function render()
    {
        return view('livewire.penyetoran-lpj.whatsapp-reminder.tablelpj-terlambat');
    }
}
