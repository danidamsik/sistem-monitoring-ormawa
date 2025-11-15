<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lembaga',
        'nomor_hp',
        'email',
    ];

    // Relasi: Lembaga memiliki banyak Proposal
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }
}
