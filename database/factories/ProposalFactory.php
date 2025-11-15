<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lembaga;
use App\Models\User;

class ProposalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'lembaga_id'       => Lembaga::inRandomOrder()->value('id'),
            'user_id'          => User::inRandomOrder()->value('id'),
            'nama_kegiatan'    => $this->faker->sentence(3),
            'tanggal_diterima' => $this->faker->date(),
            'dana_diajukan'    => $this->faker->randomFloat(2, 1000000, 50000000),
            'dana_disetujui'   => $this->faker->randomElement([
                null,                               
                0,                            
                $this->faker->randomFloat(2, 500000, 25000000) 
            ]),
        ];
    }
}
