<?php

use App\Livewire\User;
use App\Livewire\Kegiatan;
use App\Livewire\Proposal;
use App\Livewire\Dashboard;
use App\Livewire\MasterData;
use App\Livewire\PenyetoranLpj;
use App\Livewire\Edit\EditKegiatan;
use App\Livewire\Edit\EditProposal;
use App\Livewire\Edit\EditSetorLpj;
use App\Livewire\LaporanRekap\TableRekaptulasi;
use Illuminate\Support\Facades\Route;
use App\Livewire\Tambah\TambahKegiatan;
use App\Livewire\Tambah\TambahProposal;
use App\Livewire\Tambah\TambahsetorLpj;

Route::get('/dashboard', Dashboard::class);

Route::get('/pengajuan-proposal', Proposal::class);

Route::get('/pengajuan-proposal/edit/{id}', EditProposal::class);

Route::get('/pengajuan-proposal/tambah', TambahProposal::class);

Route::get('/pelaksanaan-kegiatan', Kegiatan::class);

Route::get('/pelaksanaan-kegiatan/tambah', TambahKegiatan::class);

Route::get('/pelaksanaan-kegiatan/edit/{id}', EditKegiatan::class);

Route::get('/penyetoran-lpj', PenyetoranLpj::class);

Route::get('/penyetoran-lpj/tambah', TambahsetorLpj::class);

Route::get('/penyetoran-lpj/edit/{id}', EditSetorLpj::class);

Route::get('/laporan-rekap', TableRekaptulasi::class);

Route::get('/master-data/lembaga', MasterData::class);

Route::get('/master-data/user', User::class);

