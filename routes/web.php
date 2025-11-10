<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('page-content.dashboard');
});

Route::get('/pengajuan-proposal', function () {
    return view('page-content.proposal');
});

Route::get('/pelaksanaan-kegiatan', function () {
    return view('page-content.kegiatan');
});

Route::get('/penyetoran-lpj', function () {
    return view('page-content.penyetoran-lpj');
});

Route::get('/laporan-rekap', function () {
    return view('page-content.laporan-rekap');
});

Route::get('/master-data', function () {
    return view('page-content.master-data');
});

