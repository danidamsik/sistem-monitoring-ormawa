<?php

namespace App\Livewire\MasterData\User;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Hash;

class FormUser extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $this->userId
            ],
            'password' => [
                $this->userId ? 'nullable' : 'required',
                'string',
                'min:8',
                'confirmed'
            ],
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama lengkap wajib diisi',
            'name.min' => 'Nama lengkap minimal 3 karakter',
            'name.max' => 'Nama lengkap maksimal 255 karakter',
            'name.regex' => 'Nama lengkap hanya boleh berisi huruf dan spasi',

            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'email.unique' => 'Email sudah terdaftar, gunakan email lain',

            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createOrUpdate()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $user->update($data);
            $message = 'User berhasil diperbarui!';
            $this->reset(['userId', 'name', 'email', 'password', 'password_confirmation']);
        } else {
            User::create($data);
            $message = 'User berhasil ditambahkan!';
            $this->reset(['name', 'email', 'password', 'password_confirmation']);
        }

        $this->dispatch('success', message: $message);
    }
    #[On('edit-user')]
    public function render()
    {
        return view('livewire.master-data.user.form-user');
    }
}
