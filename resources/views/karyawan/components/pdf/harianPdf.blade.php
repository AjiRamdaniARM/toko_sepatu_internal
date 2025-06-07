<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Presensi Harian</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #666;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #eee;
        }
        h2, p {
            margin: 0;
        }
    </style>
</head>
<body>

    <h2>Laporan Presensi Harian</h2>
    <p>Tanggal: {{ $filterDate ? \Carbon\Carbon::parse($filterDate)->format('d M Y') : 'Semua Tanggal' }}</p>
    <p>Nama Karyawan: {{ $karyawan->first()->nama ?? '-' }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($karyawan as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ $data->jam_masuk ?? '-' }}</td>
                    <td>{{ $data->jam_keluar ?? '-' }}</td>
                    <td>{{ ucfirst($data->status) }}</td>
                    <td>{{ $data->keterangan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data presensi</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
