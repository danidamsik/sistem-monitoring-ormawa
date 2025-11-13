<?php

namespace App\Livewire\PelaksanaanKegiatan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormKegiatan extends Component
{
    public $proposal_id, $tanggal_mulai, $tanggal_selesai, $tenggat_lpj, $lokasi, $penanggung_jawab, $status = 'belum_dimulai', $keterangan;
    public $pelaksanaan_id, $func;

    protected function rules()
    {
        return [
            'proposal_id' => 'required|exists:proposals,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'tenggat_lpj' => 'nullable|date|after_or_equal:tanggal_selesai',
            'lokasi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status' => 'required|in:belum_dimulai,sedang_berlangsung,selesai',
            'keterangan' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return [
            'proposal_id.required' => 'Proposal harus dipilih',
            'proposal_id.exists' => 'Proposal tidak valid',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi',
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai',
            'tenggat_lpj.date' => 'Format tenggat LPJ tidak valid',
            'tenggat_lpj.after_or_equal' => 'Tenggat LPJ harus sama atau setelah tanggal selesai',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ];
    }

    public function getProposal()
    {
        $query = DB::table('proposals')
            ->select(
                'proposals.id',
                'proposals.nama_kegiatan',
                'lembagas.nama_lembaga',
                'proposals.dana_disetujui',
            )
            ->join('lembagas', 'proposals.lembaga_id', '=', 'lembagas.id')
            ->leftJoin('pelaksanaans', 'proposals.id', '=', 'pelaksanaans.proposal_id');

        if ($this->pelaksanaan_id) {
            $query->where('proposals.id', function ($sub) {
                $sub->select('proposal_id')
                    ->from('pelaksanaans')
                    ->where('id', $this->pelaksanaan_id);
            });
        } else {
            $query->whereNull('pelaksanaans.id');
        }

        return $query->get();
    }

    public function create()
    {
        $this->validate($this->rules(), $this->messages());

        DB::table('pelaksanaans')->insert([
            'proposal_id' => $this->proposal_id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tenggat_lpj' => $this->tenggat_lpj,
            'lokasi' => $this->lokasi,
            'penanggung_jawab' => $this->penanggung_jawab,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
        ]);

        $this->reset(['proposal_id', 'tanggal_mulai', 'tanggal_selesai', 'tenggat_lpj', 'lokasi', 'penanggung_jawab', 'status', 'keterangan']);
        $this->dispatch('success', message: "Pelaksanaan Kegiatan Berhasil Ditambahkan");
    }

    public function update()
    {
        $this->validate($this->rules(), $this->messages());
        
        DB::table('pelaksanaans')->where('id', $this->pelaksanaan_id)
        ->update([
            'proposal_id' => $this->proposal_id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tenggat_lpj' => $this->tenggat_lpj,
            'lokasi' => $this->lokasi,
            'penanggung_jawab' => $this->penanggung_jawab,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
        ]);

        $this->reset(['proposal_id', 'tanggal_mulai', 'tanggal_selesai', 'tenggat_lpj', 'lokasi', 'penanggung_jawab', 'status', 'keterangan']);
        $this->dispatch('success', message: "Pelaksanaan Kegiatan Berhasil Diupdate");

    }

    public function mount($id = null)
    {
        if ($id) {
            $pelaksanaan = DB::table('pelaksanaans')->find($id);

            if ($pelaksanaan) {
                $this->func = 'update';
                $this->pelaksanaan_id = $id;
                $this->proposal_id = $pelaksanaan->proposal_id;
                $this->tanggal_mulai = $pelaksanaan->tanggal_mulai;
                $this->tanggal_selesai = $pelaksanaan->tanggal_selesai;
                $this->tenggat_lpj = $pelaksanaan->tenggat_lpj;
                $this->lokasi = $pelaksanaan->lokasi;
                $this->penanggung_jawab = $pelaksanaan->penanggung_jawab;
                $this->status = $pelaksanaan->status;
                $this->keterangan = $pelaksanaan->keterangan;
            }
        } else {
              $this->func = 'create';
        }
    }

    public function render()
    {
        return view('livewire.pelaksanaan-kegiatan.form-kegiatan', [
            'proposals' => $this->getProposal()
        ]);
    }
}
