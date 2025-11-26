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
            'nomor_tujuan' => '08' . $this->faker->numerify('##########'),
            'pesan'          => $this->faker->sentence(),
        ];
    }
}
