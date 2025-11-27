<?php
namespace App\Livewire\PenyetoranLpj\WhatsappReminder;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Carbon\Carbon;

class TablereminderLogs extends Component
{
    use WithPagination;
    
    public $search = '';
    
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function getreminderLogs()
    {
        $today = Carbon::today()->toDateString();
        
        return DB::table('reminder_logs')
            ->select(
                'reminder_logs.id',
                'proposals.nama_kegiatan',
                'pelaksanaans.penanggung_jawab',
                'reminder_logs.nomor_tujuan',
                'reminder_logs.pesan',
                'reminder_logs.created_at as tanggal_kirim',
            )
            ->join('pelaksanaans', 'reminder_logs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->join('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->whereNotNull('proposals.dana_disetujui')
            ->where('proposals.dana_disetujui', '>', 0)
            ->where('pelaksanaans.tanggal_selesai', '<', $today)
            ->where('lpjs.status_lpj', '=', 'Belum Disetor')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('proposals.nama_kegiatan', 'like', '%' . $this->search . '%')
                      ->orWhere('pelaksanaans.penanggung_jawab', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('reminder_logs.id', 'DESC')
            ->paginate(10);
    }
    
    public function render()
    {
        return view('livewire.penyetoran-lpj.whatsapp-reminder.tablereminder-logs', [
            'reminderLogs' => $this->getreminderLogs()
        ]);
    }
}