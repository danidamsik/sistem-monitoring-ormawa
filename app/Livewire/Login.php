<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email = ''; 
    public $password = '';

    protected $rules = [
        'email' => 'required',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'Nama atau email harus diisi.',
        'password.required' => 'Password harus diisi.',
        'password.min' => 'Password minimal 6 karakter.',
    ];

    public function login()
    {
        $this->validate();

        $throttleKey = Str::lower($this->email) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam {$seconds} detik.",
            ]);
        }

        // Tentukan apakah input berupa email atau nama
        $fieldType = filter_var($this->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $fieldType => $this->email,
            'password' => $this->password,
        ];

        // Login tanpa remember
        if (Auth::attempt($credentials)) {
            RateLimiter::clear($throttleKey);
            request()->session()->regenerate();

            return $this->redirect('/dashboard', navigate: true);
        }

        RateLimiter::hit($throttleKey, 60);

        throw ValidationException::withMessages([
            'email' => 'Nama/email atau password salah.',
        ]);
    }
    
    public function render()
    {
        return view('livewire.login')->layout('components.layouts.login');
    }
}
