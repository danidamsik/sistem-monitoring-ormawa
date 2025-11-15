<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proposal;

class PelaksanaanFactory extends Factory
{
    public function definition(): array
    {
        $year  = now()->year;

        $start = $this->faker->dateTimeBetween("$year-01-01", "$year-12-31");
        $end   = (clone $start)->modify('+' . rand(1, 5) . ' days');

        return [
            'proposal_id'      => Proposal::inRandomOrder()->value('id'),
            'tanggal_mulai'    => $start,
            'tanggal_selesai'  => $end,
            'tenggat_lpj'      => $this->faker->dateTimeBetween("$year-01-01", "$year-12-31"),
            'lokasi'           => $this->faker->city(),
            'penanggung_jawab' => $this->faker->name(),
            'status'           => $this->faker->randomElement(['belum_dimulai', 'sedang_berlangsung', 'selesai']),
            'keterangan'       => $this->faker->sentence(),
        ];
    }
}
