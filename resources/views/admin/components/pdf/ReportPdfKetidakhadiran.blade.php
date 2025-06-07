<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Laporan Ketidakhadiran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        h2, h4 { margin: 0; padding: 0; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Ketidakhadiran Karyawan</h2>
        <h4>Periode: {{ $periode }}</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode ID</th>
                <th>Nama Karyawan</th>
                <th>Tanggal</th>
                <th>Alasan</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($getData as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->kode_karyawan }}</td>
                    <td>{{ $item->karyawan->nama }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tanggal)) }}</td>
                    <td>{{ $item->Alasan }}</td>
                    <td>{{ $item->Catatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Tidak ada data ketidakhadiran pada periode ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
