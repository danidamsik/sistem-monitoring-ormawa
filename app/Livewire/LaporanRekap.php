<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Exports\RekapExport;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanRekap extends Component
{
    public $tahun;
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function mount()
    {
        $this->tahun = Carbon::now()->year;
    }

    public function exportdataPdf()
    {
        $data = $this->getdataRekaptulasi()->get();

        $pdfData = [
            'tahun' => $this->tahun,
            'rekaptulasi' => $data,
            'tanggal_cetak' => now()->format('d/m/Y H:i:s'),
            'total_kegiatan' => $data->count(),
            'total_dana_diajukan' => $data->sum('dana_diajukan'),
            'total_dana_disetujui' => $data->sum('dana_disetujui'),
        ];

        $pdf = Pdf::loadView('pdf.laporan-rekap', $pdfData)
            ->setPaper('a4', 'landscape')
            ->setOption('margin-top', 10)
            ->setOption('margin-bottom', 10)
            ->setOption('margin-left', 10)
            ->setOption('margin-right', 10);

        $fileName = 'Laporan_Rekapitulasi_' . $this->tahun . '_' . now()->format('YmdHis') . '.pdf';

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $fileName);
    }

    public function exportdataExcel()
    {
        $fileName = 'Laporan_Rekapitulasi_' . $this->tahun . '_' . now()->format('YmdHis') . '.xlsx';

        return response()->streamDownload(function () {
            echo Excel::raw(new RekapExport($this->tahun), \Maatwebsite\Excel\Excel::XLSX);
        }, $fileName);
    }

    private function getdataRekaptulasi()
    {
        $today = Carbon::today()->toDateString();

        return DB::table('lembagas')
            ->join('proposals', 'lembagas.id', '=', 'proposals.lembaga_id')
            ->join('pelaksanaans', 'proposals.id', '=', 'pelaksanaans.proposal_id')
            ->join('lpjs', 'pelaksanaans.id', '=', 'lpjs.pelaksanaan_id')
            ->select(
                'lembagas.nama_lembaga',
                'proposals.nama_kegiatan',
                'pelaksanaans.tanggal_mulai',
                'pelaksanaans.tanggal_selesai',
                'proposals.dana_diajukan',
                'proposals.dana_disetujui',
                DB::raw("CASE 
                WHEN pelaksanaans.tanggal_mulai > '{$today}' THEN 'belum_dimulai'
                WHEN pelaksanaans.tanggal_mulai <= '{$today}' AND pelaksanaans.tanggal_selesai >= '{$today}' THEN 'sedang_berlangsung'
                WHEN pelaksanaans.tanggal_selesai < '{$today}' THEN 'selesai'
            END as status_pelaksanaan"),
                'lpjs.status_lpj'
            )
            ->whereYear('pelaksanaans.tanggal_mulai', $this->tahun)
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->whereNotNull('proposals.dana_disetujui')
            ->orderBy('pelaksanaans.tanggal_mulai', 'desc');
    }

    public function formatRupiah($nominal)
    {
        return 'Rp ' . number_format($nominal, 0, ',', '.');
    }

    public function getStatusPelaksanaanBadge($status)
    {
        $badges = [
            'belum_dimulai' => [
                'class' => 'bg-gray-100 text-gray-700',
                'icon' => 'fa-circle-minus',
                'text' => 'Belum Dimulai'
            ],
            'sedang_berlangsung' => [
                'class' => 'bg-blue-100 text-blue-700',
                'icon' => 'fa-spinner',
                'text' => 'Berjalan'
            ],
            'selesai' => [
                'class' => 'bg-green-100 text-green-700',
                'icon' => 'fa-check-circle',
                'text' => 'Selesai'
            ]
        ];

        return $badges[$status] ?? $badges['belum_dimulai'];
    }

    public function getStatusLpjBadge($status)
    {
        $badges = [
            'Belum Disetor' => [
                'class' => 'bg-gray-100 text-gray-700',
                'icon' => 'fa-circle-minus',
                'text' => 'Belum Disetor'
            ],
            'Menunggu Diperiksa' => [
                'class' => 'bg-yellow-100 text-yellow-700',
                'icon' => 'fa-clock',
                'text' => 'Menunggu'
            ],
            'Di Setujui' => [
                'class' => 'bg-green-100 text-green-700',
                'icon' => 'fa-check-circle',
                'text' => 'Disetujui'
            ]
        ];

        return $badges[$status] ?? $badges['Belum Disetor'];
    }

    public function render()
    {
        return view('livewire.laporan-rekap', [
            'rekaptulasi' => $this->getdataRekaptulasi()->paginate(10)
        ]);
    }
}
