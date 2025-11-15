<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TopCard extends Component
{
    public $totalProposal;
    public $proposalBaru;
    public $menungguLpj;
    public $lpjTersetor;
    public $lpjBulanIni;

    public function mount()
    {
        $this->calculateStats();
    }

    public function calculateStats()
    {
        $this->totalProposal = DB::table('proposals')->count();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        
        $this->proposalBaru = DB::table('proposals')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->count();

        $this->menungguLpj = DB::table('lpjs')
            ->where('status_lpj', 'Belum Disetor')
            ->count();

        $this->lpjTersetor = DB::table('lpjs')
            ->where('status_lpj', 'Di Setujui')
            ->count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        
        $this->lpjBulanIni = DB::table('lpjs')
            ->where('status_lpj', 'Sudah Disetor')
            ->whereBetween('tanggal_disetor', [$startOfMonth, $endOfMonth])
            ->count();
    }

    public function render()
    {
        return view('livewire.dashboard.top-card');
    }
}