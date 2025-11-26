<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lembaga;
use App\Models\User;

class ProposalFactory extends Factory
{
    public function definition(): array
    {
        $namaKegiatan = [
            'Seminar Nasional Teknologi Informasi',
            'Pelatihan Web Development',
            'Workshop Desain Grafis',
            'Lomba Debat Mahasiswa',
            'Kegiatan Bakti Sosial',
            'Pengabdian Masyarakat',
            'Musyawarah Besar Himpunan',
            'Latihan Kepemimpinan Mahasiswa (LKM)',
            'Pelatihan Kewirausahaan',
            'Study Club Pemrograman',
            'Kuliah Umum',
            'Pelatihan Public Speaking',
            'Seminar Karir dan Profesionalisme',
            'Festival Seni Mahasiswa',
            'Bootcamp Data Science',
            'Pelatihan Jurnalistik Mahasiswa',
            'Workshop Penulisan Proposal PKM',
            'Rapat Kerja (RAKER)',
            'Upgrading Pengurus Organisasi',
            'Pelatihan Cyber Security Dasar',
        ];

        return [
            'lembaga_id'       => Lembaga::inRandomOrder()->value('id'),
            'user_id'          => User::inRandomOrder()->value('id'),
            'nama_kegiatan'    => $this->faker->randomElement($namaKegiatan),
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
