<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelaksanaan;

class LpjFactory extends Factory
{
    public function definition(): array
    {
        return [
            'pelaksanaan_id' => Pelaksanaan::inRandomOrder()->value('id'),
            'status_lpj'     => $this->faker->randomElement(['Belum Disetor','Menunggu Diperiksa','Di Setujui']),
            'tanggal_disetor'=> $this->faker->optional()->date(),
            'diperiksa_spi'  => $this->faker->boolean(),
            'catatan_spi'    => $this->faker->optional()->sentence(),
        ];
    }
}
