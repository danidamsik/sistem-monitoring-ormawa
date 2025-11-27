<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaksanaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'tenggat_lpj',
        'lokasi',
        'penanggung_jawab',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'tenggat_lpj' => 'date',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function lpj()
    {
        return $this->hasOne(Lpj::class);
    }
    public function reminderLogs()
    {
        return $this->hasMany(ReminderLog::class);
    }
}
