<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class RekapExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths, WithTitle
{
    protected $tahun;

    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return   DB::table('lembagas')
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
                'pelaksanaans.status as status_pelaksanaan',
                'lpjs.status_lpj'
            )
            ->whereYear('pelaksanaans.tanggal_mulai', $this->tahun)
            ->where('proposals.dana_disetujui', '>', 0.00)
            ->whereNotNull('proposals.dana_disetujui')
            ->where('pelaksanaans.status', 'selesai')
            ->where('lpjs.status_lpj', 'Di Setujui')
            ->orderBy('pelaksanaans.tanggal_mulai', 'desc')->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Lembaga',
            'Nama Kegiatan',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Dana Diajukan',
            'Dana Disetujui',
            'Status Pelaksanaan',
            'Status LPJ'
        ];
    }

    /**
     * @var int
     */
    private $rowNumber = 0;

    /**
     * @param mixed $row
     * @return array
     */
    public function map($row): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $row->nama_lembaga,
            $row->nama_kegiatan,
            \Carbon\Carbon::parse($row->tanggal_mulai)->format('d/m/Y'),
            \Carbon\Carbon::parse($row->tanggal_selesai)->format('d/m/Y'),
            'Rp ' . number_format($row->dana_diajukan, 0, ',', '.'),
            'Rp ' . number_format($row->dana_disetujui, 0, ',', '.'),
            $this->formatStatusPelaksanaan($row->status_pelaksanaan),
            $this->formatStatusLpj($row->status_lpj)
        ];
    }

    private function formatStatusPelaksanaan($status)
    {
        $statusMap = [
            'belum_dimulai' => 'Belum Dimulai',
            'sedang_berlangsung' => 'Sedang Berlangsung',
            'selesai' => 'Selesai'
        ];

        return $statusMap[$status] ?? $status;
    }

    /**
     * Format status LPJ
     */
    private function formatStatusLpj($status)
    {
        return $status;
    }

    /**
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 6,   // No
            'B' => 25,  // Lembaga
            'C' => 30,  // Nama Kegiatan
            'D' => 15,  // Tanggal Mulai
            'E' => 15,  // Tanggal Selesai
            'F' => 18,  // Dana Diajukan
            'G' => 18,  // Dana Disetujui
            'H' => 20,  // Status Pelaksanaan
            'I' => 20,  // Status LPJ
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 12,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2563EB'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'D1D5DB'],
                ],
            ],
        ]);

        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('A1:I' . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'E5E7EB'],
                ],
            ],
        ]);

        $sheet->getStyle('A2:A' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D2:E' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('F2:G' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('H2:I' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->freezePane('A2');

        return [];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Rekap ' . $this->tahun;
    }
}
