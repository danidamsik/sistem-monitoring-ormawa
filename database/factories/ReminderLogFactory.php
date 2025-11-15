<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelaksanaan;

class ReminderLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pelaksanaan_id' => Pelaksanaan::inRandomOrder()->value('id'),
            'email_tujuan'   => $this->faker->email(),
            'pesan'          => $this->faker->sentence(),
            'tanggal_kirim'  => now(),
            'status'         => $this->faker->randomElement(['Berhasil', 'Gagal']),
        ];
    }
}
