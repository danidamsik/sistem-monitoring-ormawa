<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{

    public function definition(): array
    {
        $nama = [
            'Damsik',
            'Mutia',
            'Haikal Riziq'
        ];
        return [
            'name'  => $this->faker->randomElement($nama),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password')
        ];
    }
}
