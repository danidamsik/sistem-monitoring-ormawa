<?php

namespace Database\Factories;

use App\Models\Lembaga;
use Illuminate\Database\Eloquent\Factories\Factory;

class LembagaFactory extends Factory
{
    public function definition(): array
    {
        $lembaga = [
            'BEM Universitas',
            'BEM Fakultas',
            'DEMA Universitas',
            'DEMA Fakultas',
            'HMJ Informatika',
            'HMJ Ekonomi Syariah',
            'HMJ Pendidikan Agama Islam',
            'HMJ Hukum Ekonomi Syariah',
            'UKM Pramuka',
            'UKM Paduan Suara',
            'UKM KSR',
            'UKM Mapala',
            'UKM Olahraga',
            'UKM Seni',
            'UKM Jurnalistik',
            'UKM Penalaran',
            'UKM Teater',
            'UKM English Club',
            'UKM Robotika',
            'UKM IT Club',
            'UKM Fotografi',
            'LDK (Lembaga Dakwah Kampus)',
            'ROHIS',
            'ROHKRIS',
            'KPU Mahasiswa',
            'MPM Universitas',
        ];

        $nomor = [
            '085210678501',
            '085398481257',
            '087776990696',
            '082251702631',
            '082398433625',
            '082195924323'
        ];

        return [
            'nama_lembaga' => $this->faker->unique()->randomElement($lembaga),
            'nomor_hp'     => $this->faker->randomElement($nomor),
            'email'        => $this->faker->unique()->safeEmail(),
        ];
    }
}
