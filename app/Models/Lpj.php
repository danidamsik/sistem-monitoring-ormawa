<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpj extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelaksanaan_id',
        'status_lpj',
        'tanggal_disetor',
        'diperiksa_spi',
        'catatan_spi',
    ];

    protected $casts = [
        'tanggal_disetor' => 'date',
        'diperiksa_spi' => 'boolean',
    ];
    
    public function pelaksanaan()
    {
        return $this->belongsTo(Pelaksanaan::class);
    }
}
