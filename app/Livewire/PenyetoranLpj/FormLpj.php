<?php

namespace App\Livewire\PenyetoranLpj;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormLpj extends Component
{
    public $id, $pelaksanaan_id, $status_lpj, $tanggal_disetor, $diperiksa_spi, $catatan_spi;

    public function mount($id = null)
    {
        if ($id) {
            $lpj = DB::table('lpj')->find($id);
            if ($lpj) {
                $this->id = $id;
                $this->pelaksanaan_id = $lpj->pelaksanaan_id;
                $this->status_lpj = $lpj->status_lpj;
                $this->tanggal_disetor = $lpj->tanggal_distor;
                $this->diperiksa_spi = $lpj->diperiksa_spi;
                $this->catatan_spi = $lpj->catatan_spi;
            }
        }
    }

    public function getPelaksanaan()
    {
        return DB::table('pelaksanaans')
            ->leftJoin('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->join('proposals', 'pelaksanaans.proposal_id', '=', 'proposals.id')
            ->whereNull('lpjs.pelaksanaan_id')
            ->select('pelaksanaans.id', 'proposals.nama_kegiatan')
            ->get();
    }

    public function create()
    {
        $this->validate($this->rules(), $this->messages());

        DB::table('lpjs')->insert([
            'pelaksanaan_id' => $this->pelaksanaan_id,
            'status_lpj' => $this->status_lpj,
            'tanggal_disetor' => $this->tanggal_disetor,
            'diperiksa_spi' => $this->diperiksa_spi,
            'catatan_spi' => $this->catatan_spi
        ]);

        $this->reset(['pelaksanaan_id', 'status_lpj', 'tanggal_disetor', 'diperiksa_spi', 'catatan_spi']);
        $this->dispatch('success', message: "Lpj Berhasil Ditambahkan!");
    }

    public function update()
    {
        $this->validate($this->rules(), $this->messages());

        DB::table('lpjs')->where('id', $this->id)
            ->update([
                'pelaksanaan_id' => $this->pelaksanaan_id,
                'status_lpj' => $this->status_lpj,
                'tanggal_disetor' => $this->tanggal_disetor,
                'diperiksa_spi' => $this->diperiksa_spi,
                'catatan_spi' => $this->catatan_spi
            ]);

        $this->dispatch('success', message: "Lpj Berhasil DiUpdate!");
    }

    public function render()
    {
        return view('livewire.penyetoran-lpj.form-lpj', ['pelaksanaan' => $this->getPelaksanaan()]);
    }

    protected function rules()
    {
        return [
            'pelaksanaan_id' => 'required|exists:pelaksanaans,id',
            'status_lpj' => 'required|in:Belum Disetor,Menunggu Diperiksa,Di Setujui',
            'tanggal_disetor' => 'nullable|date',
            'diperiksa_spi' => 'required|boolean',
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
            'diperiksa_spi.required' => 'Status pemeriksaan SPI wajib diisi.',
            'diperiksa_spi.boolean' => 'Nilai pemeriksaan SPI harus berupa benar (1) atau salah (0).',
            'catatan_spi.string' => 'Catatan SPI harus berupa teks.',
            'catatan_spi.max' => 'Catatan SPI maksimal 1000 karakter.',
        ];
    }
}
