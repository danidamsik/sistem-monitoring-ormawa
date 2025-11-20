<?php

namespace App\Livewire\PenyetoranLpj\WhatsappReminder;

use App\Models\Pelaksanaan;
use Livewire\Component;

class FormReminder extends Component
{
    public $nama_kegiatan, $penanggung_jawab, $nomor_tujuan, $pesan;
    
    public function mount($id)
    {
        $pelaksanaan = Pelaksanaan::find($id);
        $this->nama_kegiatan = $pelaksanaan->proposal->nama_kegiatan;
        $this->penanggung_jawab = $pelaksanaan->penanggung_jawab;
        $this->nomor_tujuan = $pelaksanaan->proposal->lembaga->nomor_hp;
    }

    public function render()
    {
        return view('livewire.penyetoran-lpj.whatsapp-reminder.form-reminder');
    }
}
