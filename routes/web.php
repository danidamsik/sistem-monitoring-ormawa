<?php

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('page-content.dashboard');
});

Route::get('/proposal', function () {
    return view('page-content.proposal');
});

Route::get('/kegiatan', function () {
    return view('page-content.kegiatan');
});

Route::get('/penyetoran-lpj', function () {
    return view('page-content.penyetoran-lpj');
});

Route::get('/laporan-rekap', function () {
    return view('page-content.laporan-rekap');
});
