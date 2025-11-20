<?php

namespace App\Livewire\PenyetoranLpj\WhatsappReminder;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablereminderLogs extends Component
{
    use WithPagination;
    
    public function getreminderLogs()
    {
        return DB::table('reminder_logs')->select(
            'reminder_logs.id',
            'proposals.nama_kegiatan',
            'pelaksanaans.penanggung_jawab',
            'reminder_logs.nomor_tujuan',
            'reminder_logs.pesan',
            'reminder_logs.created_at as tanggal_kirim',
        )->join('pelaksanaans', 'reminder_logs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.penyetoran-lpj.whatsapp-reminder.tablereminder-logs', ['reminderLogs' => $this->getreminderLogs()]);
    }
}
