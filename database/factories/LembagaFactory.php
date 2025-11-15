<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LembagaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_lembaga' => $this->faker->company(),
            'nomor_hp'     => $this->faker->phoneNumber(),
            'email'        => $this->faker->unique()->safeEmail(),
        ];
    }
}
