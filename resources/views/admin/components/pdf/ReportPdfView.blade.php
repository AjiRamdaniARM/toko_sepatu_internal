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
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Laporan Presensi Harian</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($karyawan as $kar)
                @foreach ($kar->absensi as $absen)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kar->nama }}</td>
                        <td>{{ $kar->jabatan ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $absen->jam_masuk ?? '-' }}</td>
                        <td>{{ $absen->jam_keluar ?? '-' }}</td>
                        <td>{{ ucfirst($absen->status) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
