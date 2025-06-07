<h2 style="text-align: center;">Laporan Presensi Mingguan</h2>
<p style="text-align: center;">
    <strong>Periode:</strong>
    {{ \Carbon\Carbon::parse($start)->format('d M Y') }} -
    {{ \Carbon\Carbon::parse($end)->format('d M Y') }}
</p>

<table border="1" cellpadding="6" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nama Karyawan</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Izin</th>
        </tr>
    </thead>
    <tbody>
        @foreach($karyawan as $data)
            @php
                $hadir = $data->absensi->where('status', 'Hadir')->count();
                $sakit = $data->absensi->where('status', 'Sakit')->count();
                $izin  = $data->absensi->where('status', 'Izin')->count();
            @endphp
            <tr>
                <td>{{ $data->nama }}</td>
                <td>{{ $hadir }} Hari</td>
                <td>{{ $sakit }} Hari</td>
                <td>{{ $izin }} Hari</td>
            </tr>
        @endforeach
    </tbody>
</table>
