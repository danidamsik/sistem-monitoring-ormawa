<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Rekapitulasi {{ $tahun }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            line-height: 1.4;
            color: #333;
            padding: 30px 40px; /* Padding utama untuk seluruh halaman */
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #2563eb;
        }

        .header h1 {
            font-size: 18px;
            color: #1e40af;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .header p {
            font-size: 11px;
            color: #666;
        }

        .info-box {
            background-color: #f3f4f6;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            border-left: 4px solid #2563eb;
        }

        .info-box table {
            width: 100%;
        }

        .info-box td {
            padding: 4px 0;
            font-size: 10px;
        }

        .info-box td:first-child {
            font-weight: bold;
            width: 150px;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table.data-table th {
            background-color: #1e40af;
            color: white;
            padding: 10px 8px;
            text-align: left;
            font-size: 9px;
            font-weight: bold;
            border: 1px solid #1e3a8a;
        }

        table.data-table td {
            padding: 8px;
            border: 1px solid #d1d5db;
            font-size: 9px;
        }

        table.data-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        table.data-table tbody tr:hover {
            background-color: #f3f4f6;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 8px;
            font-weight: bold;
            text-align: center;
        }

        .status-belum {
            background-color: #f3f4f6;
            color: #374151;
        }

        .status-berjalan {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-selesai {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-menunggu {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-disetujui {
            background-color: #dcfce7;
            color: #166534;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .summary-box {
            background-color: #eff6ff;
            padding: 15px 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #bfdbfe;
        }

        .summary-box table {
            width: 100%;
        }

        .summary-box td {
            padding: 6px 0;
            font-size: 10px;
        }

        .summary-box td:first-child {
            font-weight: bold;
            width: 200px;
        }

        .summary-box .total-row {
            border-top: 2px solid #2563eb;
            padding-top: 8px;
            margin-top: 5px;
            font-weight: bold;
            font-size: 11px;
        }

        .footer {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #d1d5db;
            text-align: right;
            font-size: 9px;
            color: #6b7280;
        }

        .page-break {
            page-break-after: always;
        }

        /* Untuk halaman selanjutnya jika ada banyak data */
        @page {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>LAPORAN REKAPITULASI KEGIATAN</h1>
            <p>Tahun {{ $tahun }}</p>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <table>
                <tr>
                    <td>Periode Laporan</td>
                    <td>: Tahun {{ $tahun }}</td>
                </tr>
                <tr>
                    <td>Tanggal Cetak</td>
                    <td>: {{ $tanggal_cetak }}</td>
                </tr>
                <tr>
                    <td>Total Kegiatan</td>
                    <td>: {{ $total_kegiatan }} Kegiatan</td>
                </tr>
            </table>
        </div>

        <!-- Data Table -->
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 3%;">No</th>
                    <th style="width: 12%;">Lembaga</th>
                    <th style="width: 18%;">Nama Kegiatan</th>
                    <th style="width: 9%;">Tgl Mulai</th>
                    <th style="width: 9%;">Tgl Selesai</th>
                    <th style="width: 11%;">Dana Diajukan</th>
                    <th style="width: 11%;">Dana Disetujui</th>
                    <th style="width: 12%;">Status Pelaksanaan</th>
                    <th style="width: 12%;">Status LPJ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rekaptulasi as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->nama_lembaga }}</td>
                        <td>{{ $item->nama_kegiatan }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d/m/Y') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') }}</td>
                        <td class="text-right">{{ 'Rp ' . number_format($item->dana_diajukan, 0, ',', '.') }}</td>
                        <td class="text-right">{{ 'Rp ' . number_format($item->dana_disetujui, 0, ',', '.') }}</td>
                        <td class="text-center">
                            @if ($item->status_pelaksanaan == 'belum_dimulai')
                                <span class="status-badge status-belum">Belum Dimulai</span>
                            @elseif($item->status_pelaksanaan == 'sedang_berlangsung')
                                <span class="status-badge status-berjalan">Berjalan</span>
                            @else
                                <span class="status-badge status-selesai">Selesai</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($item->status_lpj == 'Belum Disetor')
                                <span class="status-badge status-belum">Belum Disetor</span>
                            @elseif($item->status_lpj == 'Menunggu Diperiksa')
                                <span class="status-badge status-menunggu">Menunggu</span>
                            @else
                                <span class="status-badge status-disetujui">Disetujui</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center" style="padding: 30px;">
                            Tidak ada data untuk tahun {{ $tahun }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Summary Box -->
        <div class="summary-box">
            <table>
                <tr>
                    <td>Total Dana Diajukan</td>
                    <td>: <strong>{{ 'Rp ' . number_format($total_dana_diajukan, 0, ',', '.') }}</strong></td>
                </tr>
                <tr class="total-row">
                    <td>Total Dana Disetujui</td>
                    <td>: <strong style="color: #1e40af;">{{ 'Rp ' . number_format($total_dana_disetujui, 0, ',', '.') }}</strong>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Dokumen ini digenerate secara otomatis oleh sistem pada {{ $tanggal_cetak }}</p>
        </div>
    </div>
</body>

</html>