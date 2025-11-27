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
        $today = Carbon::today()->toDateString();
        
        $monthlyData = array_fill(1, 12, 0);
        
        $activities = DB::table('pelaksanaans')
            ->join('lpjs', 'lpjs.pelaksanaan_id', '=', 'pelaksanaans.id')
            ->join('proposals', 'proposals.id', '=', 'pelaksanaans.proposal_id')
            ->select(
                DB::raw('MONTH(pelaksanaans.tanggal_mulai) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('pelaksanaans.tanggal_mulai', $currentYear)
            // ✅ Ganti kondisi status dengan logika tanggal
            ->where('pelaksanaans.tanggal_selesai', '<', $today)
            ->whereNotNull('proposals.dana_disetujui')
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->groupBy(DB::raw('MONTH(pelaksanaans.tanggal_mulai)'))
            ->get();
        
        foreach ($activities as $activity) {
            $monthlyData[$activity->month] = $activity->total;
        }
        
        $this->chartData = array_values($monthlyData);
        $this->chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    }
    
    public function render()
    {
        return view('livewire.dashboard.chart');
    }
}