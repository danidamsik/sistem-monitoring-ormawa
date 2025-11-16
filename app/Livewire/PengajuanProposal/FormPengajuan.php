<?php

namespace App\Livewire\PengajuanProposal;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FormPengajuan extends Component
{
    public $lembaga_id, $nama_kegiatan, $tanggal_diterima, $dana_diajukan, $dana_disetujui;
    public $proposal_id; 

    public function rules()
    {
        return [
            'lembaga_id' => 'required|exists:lembagas,id',
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_diterima' => 'required|date',
            'dana_diajukan' => 'required|numeric|min:0',
            'dana_disetujui' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'lembaga_id.required' => 'Lembaga harus dipilih.',
            'lembaga_id.exists' => 'Lembaga yang dipilih tidak valid.',
            'nama_kegiatan.required' => 'Nama kegiatan tidak boleh kosong.',
            'nama_kegiatan.max' => 'Nama kegiatan terlalu panjang (maksimal 255 karakter).',
            'tanggal_diterima.required' => 'Tanggal diterima harus diisi.',
            'tanggal_diterima.date' => 'Format tanggal tidak valid.',
            'dana_diajukan.required' => 'Dana yang diajukan wajib diisi.',
            'dana_diajukan.numeric' => 'Dana harus berupa angka.',
            'dana_diajukan.min' => 'Dana yang diajukan tidak boleh negatif.',
            'dana_disetujui.numeric' => 'Dana disetujui harus berupa angka.',
            'dana_disetujui.min' => 'Dana disetujui tidak boleh negatif.',
        ];
    }

    public function create()
    {
        $this->validate($this->rules(), $this->messages());

        $danaDisetujui = $this->dana_disetujui === 0 || $this->dana_disetujui === "0"
        ? "0.00"
        : ($this->dana_disetujui ?: null);

        DB::table('proposals')->insert([
            'lembaga_id' => $this->lembaga_id,
            'user_id' => Auth::user()->id,
            'nama_kegiatan' => $this->nama_kegiatan,
            'tanggal_diterima' => Carbon::parse($this->tanggal_diterima)->format('Y-m-d'),
            'dana_diajukan' => $this->dana_diajukan,
            'dana_disetujui' => $danaDisetujui,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->reset(['lembaga_id', 'nama_kegiatan', 'tanggal_diterima', 'dana_diajukan', 'dana_disetujui']);

        $this->dispatch('success', message: "Proposal berhasil ditambahkan!");
    }

    public function update()
    {
        $this->validate($this->rules(), $this->messages());
        
        $danaDisetujui = $this->dana_disetujui === 0 || $this->dana_disetujui === "0"
        ? "0.00"
        : ($this->dana_disetujui ?: null);

        DB::table('proposals')
            ->where('id', $this->proposal_id)
            ->update([
                'lembaga_id' => $this->lembaga_id,
                'user_id' => Auth::user()->id,
                'nama_kegiatan' => $this->nama_kegiatan,
                'tanggal_diterima' => Carbon::parse($this->tanggal_diterima)->format('Y-m-d'),
                'dana_diajukan' => $this->dana_diajukan,
                'dana_disetujui' => $danaDisetujui,
            ]);

        $this->dispatch('success', message: "Proposal berhasil diperbarui!");
    }

    public function mount($id = null)
    {
        if ($id) {
            $proposal = DB::table('proposals')->find($id);
            if ($proposal) {
                $this->proposal_id = $id;
                $this->lembaga_id = $proposal->lembaga_id;
                $this->nama_kegiatan = $proposal->nama_kegiatan;
                $this->tanggal_diterima = $proposal->tanggal_diterima;
                $this->dana_diajukan = $proposal->dana_diajukan;
                $this->dana_disetujui = $proposal->dana_disetujui;
            }
        }
    }

    public function getLembagas()
    {
        return DB::table('lembagas')
            ->select('id', 'nama_lembaga')
            ->orderBy('nama_lembaga', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.pengajuan-proposal.form-pengajuan', [
            'lembaga' => $this->getLembagas(),
        ]);
    }
}