<?php

namespace App\Livewire\MasterData\Lembaga;

use App\Models\Lembaga;
use Livewire\Component;
use Illuminate\Validation\Rule;

class FormLembaga extends Component
{
    public $id_lembaga, $nama_lembaga, $nomor_hp, $email;

    protected function rules()
    {
        return [
            'nama_lembaga' => 'required|string|max:255',

            'nomor_hp' => 'required',

            'email'    => [
                'required',
                'email',
                Rule::unique('lembagas', 'email')->ignore($this->id_lembaga, 'id')
            ],
        ];
    }

    protected function messages()
    {
        return [
            'nama_lembaga.required' => 'Nama lembaga wajib diisi.',
            'nama_lembaga.string'   => 'Nama lembaga harus berupa teks.',
            'nama_lembaga.max'      => 'Nama lembaga maksimal 255 karakter.',

            'nomor_hp.required' => 'Nomor HP wajib diisi.',
            
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'email.unique'   => 'Email sudah terdaftar.',
        ];
    }

    public function updateOrCreate()
    {
        $this->validate($this->rules(), $this->messages());

        Lembaga::updateOrCreate(
            ['id' => $this->id_lembaga],
            [
                'nama_lembaga' => $this->nama_lembaga,
                'nomor_hp' => $this->nomor_hp,
                'email' => $this->email
            ]
        );

        $message = $this->id_lembaga ? "Lembaga Berhasil diupdate!" : "Lembaga Berhasil Disimpan";

        $this->reset();
        $this->dispatch('success', message: $message);
    }

    public function render()
    {
        return view('livewire.master-data.lembaga.form-lembaga');
    }
}
