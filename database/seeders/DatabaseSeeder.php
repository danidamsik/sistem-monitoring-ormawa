<?php

namespace Database\Seeders;

use App\Models\Lpj;
use App\Models\User;
use App\Models\Lembaga;
use App\Models\Proposal;
use App\Models\Pelaksanaan;
use App\Models\ReminderLog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(1)->create();
        Lembaga::factory(10)->create();

        $proposals = Proposal::factory(100)->create();
        $proposalsWithPelaksanaan = $proposals->random(70);

        $pelaksanaans = $proposalsWithPelaksanaan->map(function ($proposal) {
            return Pelaksanaan::factory()->create([
                'proposal_id' => $proposal->id
            ]);
        });

        $pelaksanaansWithLpj = $pelaksanaans->random(60);

        $pelaksanaansWithLpj->each(function ($pelaksanaan) {
            Lpj::factory()->create([
                'pelaksanaan_id' => $pelaksanaan->id
            ]);

            ReminderLog::factory(rand(1, 5))->create([
                'pelaksanaan_id' => $pelaksanaan->id
            ]);
        });
    }
}
