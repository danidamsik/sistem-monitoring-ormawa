<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelaksanaan_id',
        'nomor_tujuan',
        'pesan',
    ];

    // Relasi: ReminderLog dimiliki oleh satu Pelaksanaan
    public function pelaksanaan()
    {
        return $this->belongsTo(Pelaksanaan::class);
    }
}
