<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Rekap Absensi Bulanan {{ \Carbon\Carbon::parse($filterMonth)->translatedFormat('F Y') }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Rekap Absensi Bulanan</h2>
    <p>Bulan: {{ \Carbon\Carbon::parse($filterMonth)->translatedFormat('F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Izin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($getDataAbsensi as $karyawan)
            <tr>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->absensi->where('status', 'Hadir')->count() }} Hari</td>
                <td>{{ $karyawan->absensi->where('status', 'Sakit')->count() }} Hari</td>
                <td>{{ $karyawan->absensi->where('status', 'Izin')->count() }} Hari</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
