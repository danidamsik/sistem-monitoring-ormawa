<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'lembaga_id',
        'user_id',
        'nama_kegiatan',
        'tanggal_diterima',
        'dana_diajukan',
        'dana_disetujui',
    ];

    protected $casts = [
        'tanggal_diterima' => 'date',
        'dana_diajukan' => 'decimal:2',
        'dana_disetujui' => 'decimal:2',
    ];

    // Relasi: Proposal dimiliki oleh satu Lembaga
    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }

    // Relasi: Proposal dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Proposal memiliki satu Pelaksanaan
    public function pelaksanaan()
    {
        return $this->hasOne(Pelaksanaan::class);
    }
}
