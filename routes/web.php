<?php

use App\Livewire\User;
use App\Livewire\Login;
use App\Livewire\Kegiatan;
use App\Livewire\Proposal;
use App\Livewire\Dashboard;
use App\Livewire\MasterData;
use App\Livewire\ReminderWa;
use App\Livewire\LaporanRekap;
use App\Livewire\PenyetoranLpj;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\PenyetoranLpj\FormLpj;
use App\Livewire\PengajuanProposal\FormPengajuan;
use App\Livewire\PelaksanaanKegiatan\FormKegiatan;
use App\Livewire\PenyetoranLpj\WhatsappReminder\FormReminder;

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', Dashboard::class);

    Route::get('/pengajuan-proposal', Proposal::class);
    Route::get('/pengajuan-proposal/edit/{id}', FormPengajuan::class);
    Route::get('/pengajuan-proposal/tambah', FormPengajuan::class);

    Route::get('/pelaksanaan-kegiatan', Kegiatan::class);
    Route::get('/pelaksanaan-kegiatan/tambah', FormKegiatan::class);
    Route::get('/pelaksanaan-kegiatan/edit/{id}', FormKegiatan::class);

    Route::get('/penyetoran-lpj', PenyetoranLpj::class);
    Route::get('/penyetoran-lpj/tambah', FormLpj::class);
    Route::get('/penyetoran-lpj/edit/{id}', FormLpj::class);

    Route::get('/laporan-rekap', LaporanRekap::class);

    Route::get('/master-data/lembaga', MasterData::class);
    Route::get('/master-data/user', User::class);

    Route::get("/penyetoran-lpj/reminder-whatsapp", ReminderWa::class);

    Route::get("/penyetoran-lpj/reminder-whatsapp/send-messege/{id}", FormReminder::class);

    Route::get('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/', Login::class)->name('login');

    Route::get('/login', Login::class);
});