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

        $lokasiKegiatan = [
            'Aula Kampus',
            'Ruang Kelas Fakultas',
            'Gedung Serbaguna',
            'Lapangan Kampus',
            'Ruang Rapat Himpunan',
            'Auditorium',
            'Perpustakaan Kampus',
            'Laboratorium Komputer',
            'Lapangan Futsal Kampus',
            'Masjid Kampus',
            'Balai Desa',
            'Panti Asuhan',
            'Taman Kota',
            'Gedung Student Center',
            'Ruang Multimedia',
            'Workstation Lab Riset',
            'Gedung Rektorat Lantai 2',
            'Lapangan Upacara',
            'Area Parkir Timur Kampus',
            'Kantin Kampus',
        ];

        $nama = [
            'Damsik',
            'Mutia',
            'Haikal Rizik',
            'Alya NurRamadhani',
            'Andi Nurul',
            'Nurfaain Syafira',
            'Sultan Fajrul Islami',
            'Sihab',
            'Rahmad Ramdahan',
            'Muh. Ilham',
            'Muh. Junardi',
            'Agim Fahriansyah',
            'Arhan Ramadhan',
            'Moh. Fadil',
            'Pram',
            'Rey Albani',
            'Abdus Salam anwar',
        ];

        $keterangan = [
            'Kegiatan berjalan lancar sesuai rundown.',
            'Peserta hadir tepat waktu dan antusias.',
            'Terdapat sedikit kendala pada peralatan sound system.',
            'Pemateri terlambat datang sekitar 15 menit.',
            'Tempat kegiatan perlu penataan ulang sebelum dimulai.',
            'Koordinasi panitia berjalan dengan baik.',
            'Dokumentasi kegiatan telah disiapkan oleh tim media.',
            'Peserta melebihi target yang ditentukan.',
            'Cuaca mendukung sehingga kegiatan outdoor berjalan lancar.',
            'Kunjungan lapangan dilakukan bersama masyarakat sekitar.',
            'Sesi tanya jawab berlangsung aktif.',
            'Panitia melakukan evaluasi setelah kegiatan selesai.',
            'Konsumsi dibagikan sebelum acara dimulai.',
            'Registrasi peserta berjalan tanpa hambatan.',
            'Sesi materi berjalan dengan baik dan interaktif.',
            'Acara ditutup dengan sesi foto bersama.',
        ];

        return [
            'proposal_id'      => Proposal::inRandomOrder()->value('id'),
            'tanggal_mulai'    => $start,
            'tanggal_selesai'  => $end,
            'tenggat_lpj'      => $this->faker->dateTimeBetween("$year-01-01", "$year-12-31"),
            'lokasi'           => $this->faker->randomElement($lokasiKegiatan),
            'penanggung_jawab' => $this->faker->randomElement($nama),
            'status'           => $this->faker->randomElement(['belum_dimulai', 'sedang_berlangsung', 'selesai']),
            'keterangan'       => $this->faker->randomElement($keterangan),
        ];
    }
}
