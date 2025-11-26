<?php

namespace App\Livewire\PenyetoranLpj\WhatsappReminder;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pelaksanaan;
use App\Models\ReminderLog;
use Illuminate\Support\Facades\Http;

class FormReminder extends Component
{
    public $pelaksanaan_id, $nama_kegiatan, $penanggung_jawab, $nomor_tujuan, $pesan, $terlambat;

    public function mount($id)
    {
        $pelaksanaan = Pelaksanaan::findOrFail($id);
        $this->pelaksanaan_id = $pelaksanaan->id;
        $this->nama_kegiatan    = $pelaksanaan->proposal->nama_kegiatan;
        $this->penanggung_jawab = $pelaksanaan->penanggung_jawab;
        $nomor                  = $pelaksanaan->proposal->lembaga->nomor_hp;
        $this->nomor_tujuan     = $this->formatNomor($nomor);
        $this->terlambat = Carbon::parse($pelaksanaan->tanggal_selesai->addWeek())->diffInDays(Carbon::now());

        $namaLembaga = $pelaksanaan->proposal->lembaga->nama_lembaga;
        $this->pesan =
            "Assalamu'alaikum warahmatullahi wabarakatuh,\n\n" .
            "Dengan hormat, kami mengingatkan bahwa laporan pertanggungjawaban (LPJ) untuk kegiatan *{$this->nama_kegiatan}* " .
            "yang dilaksanakan oleh *{$namaLembaga}*, dengan penanggung jawab *{$this->penanggung_jawab}*, " .
            "hingga saat ini belum kami terima.\n\n" .
            "Saat ini LPJ telah terlambat selama *{$this->terlambat} hari* dari batas waktu yang ditentukan.\n\n" .
            "Mohon agar LPJ dapat segera disetorkan sesuai ketentuan yang berlaku.\n\n" .
            "Atas perhatian dan kerja samanya, kami ucapkan terima kasih.\n" .
            "Wassalamu'alaikum warahmatullahi wabarakatuh.";
    }

    private function formatNomor($nomor)
    {
        $nomor = preg_replace('/[^0-9]/', '', $nomor);
        if (substr($nomor, 0, 1) === "0") {
            return "62" . substr($nomor, 1);
        }

        return $nomor;
    }

    public function send()
    {
        $this->validate([
            'nomor_tujuan' => 'required',
            'pesan'        => 'required|min:3',
        ]);

        $token = env('FONNTE_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])
            ->asMultipart()
            ->post('https://api.fonnte.com/send', [
                'target'      => $this->nomor_tujuan,
                'message'     => $this->pesan,
                'countryCode' => '62',
            ])
            ->json();

        if ($response['status']) {
            
            ReminderLog::create([
                'pelaksanaan_id' => $this->pelaksanaan_id, 
                'nomor_tujuan'   => $this->nomor_tujuan,
                'pesan'          => $this->pesan,
            ]);

            $this->dispatch('success', message: "Pesan Berhasil Dikirim!");
        } else {
            $this->dispatch('success', message: "Pesan Gagal Dikirim!");
        }
    }

    public function render()
    {
        return view('livewire.penyetoran-lpj.whatsapp-reminder.form-reminder');
    }
}
