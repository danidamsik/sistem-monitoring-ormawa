<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Chart extends Component
{
    public $chartData;
    public $chartLabels;

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $currentYear = Carbon::now()->year;
        
        // Array untuk menyimpan data per bulan (1-12)
        $monthlyData = array_fill(1, 12, 0);
        
        // Query untuk menghitung jumlah kegiatan per bulan berdasarkan tanggal_mulai pelaksanaan
        $activities = DB::table('pelaksanaans')
            ->select(
                DB::raw('MONTH(tanggal_mulai) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('tanggal_mulai', $currentYear)
            ->groupBy(DB::raw('MONTH(tanggal_mulai)'))
            ->get();
        
        // Isi data ke array bulan
        foreach ($activities as $activity) {
            $monthlyData[$activity->month] = $activity->total;
        }
        
        // Convert ke array values saja (index 1-12 menjadi 0-11)
        $this->chartData = array_values($monthlyData);
        
        // Labels bulan
        $this->chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    }

    public function render()
    {
        return view('livewire.dashboard.chart');
    }
}