<?php

namespace App\Livewire\PenyetoranLpj;

use App\Models\Lpj;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormLpj extends Component
{
    public $id, $pelaksanaan_id, $pelaksanaan_name, $status_lpj, $tanggal_disetor, $catatan_spi;

    public function mount($id)
    {
        $lpj = Lpj::find($id);
        if ($lpj) {
            $this->id = $lpj->id;
            $this->pelaksanaan_id = $lpj->pelaksanaan_id;
            $this->status_lpj = $lpj->status_lpj;
            $this->tanggal_disetor = $lpj->tanggal_disetor;
            $this->catatan_spi = $lpj->catatan_spi;
            $this->pelaksanaan_name = $lpj->pelaksanaan->proposal->nama_kegiatan;
        } else {
            return $this->redirect('/penyetoran-lpj', navigate:true);
        }
    }

    public function update()
    {
        $this->validate($this->rules(), $this->messages());

        DB::table('lpjs')->where('id', $this->id)
            ->update([
                'pelaksanaan_id' => $this->pelaksanaan_id,
                'status_lpj' => $this->status_lpj,
                'tanggal_disetor' => $this->tanggal_disetor,
                'catatan_spi' => $this->catatan_spi,
            ]);

        $this->dispatch('success', message: "LPJ Berhasil DiUpdate!");
    }

    public function render()
    {
        return view('livewire.penyetoran-lpj.form-lpj');
    }

    protected function rules()
    {
        return [
            'pelaksanaan_id' => 'required|exists:pelaksanaans,id',
            'status_lpj' => 'required|in:Belum Disetor,Menunggu Diperiksa,Di Setujui',
            'tanggal_disetor' => 'nullable|date',
            'catatan_spi' => 'nullable|string|max:1000',
        ];
    }

    protected function messages()
    {
        return [
            'pelaksanaan_id.required' => 'Pelaksanaan harus dipilih.',
            'pelaksanaan_id.exists' => 'Pelaksanaan yang dipilih tidak valid.',
            'status_lpj.required' => 'Status LPJ wajib diisi.',
            'status_lpj.in' => 'Status LPJ harus salah satu dari: Belum Disetor, Menunggu Diperiksa, atau Di Setujui.',
            'tanggal_disetor.date' => 'Tanggal setor harus berupa format tanggal yang valid.',
            'catatan_spi.string' => 'Catatan SPI harus berupa teks.',
            'catatan_spi.max' => 'Catatan SPI maksimal 1000 karakter.',
        ];
    }
}
