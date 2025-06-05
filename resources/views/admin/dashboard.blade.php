<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('admin.components.navbar')
        {{-- == main == --}}
       <main class="bg-gray-50 min-h-[calc(100vh-110px)] py-6">
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
     <div class="bg-white border border-gray-300 rounded p-4 flex flex-col items-center space-y-2 select-none">
      <i class="fas fa-user-check text-3xl text-gray-600"></i>
      <p class="text-sm font-semibold text-gray-600">Pegawai Hadir</p>
      <p class="text-2xl font-bold text-gray-800">{{$countKaryawan}}</p>
     </div>
     <div class="bg-white border border-gray-300 rounded p-4 flex flex-col items-center space-y-2 select-none">
      <i class="fas fa-user-times text-3xl text-gray-600"></i>
      <p class="text-sm font-semibold text-gray-600">Pegawai Alfa</p>
      <p class="text-2xl font-bold text-gray-800">{{$countKaryawanAlfa}}</p>
     </div>
     <div class="bg-white border border-gray-300 rounded p-4 flex flex-col items-center space-y-2 select-none">
      <i class="fas fa-user-clock text-3xl text-gray-600"></i>
      <p class="text-sm font-semibold text-gray-600">Pegawai Izin</p>
      <p class="text-2xl font-bold text-gray-800">{{$countKaryawanIzin}}</p>
     </div>
    </div>
    <section>
     <h3 class="text-gray-900 font-semibold text-base mb-3 select-none">
      Rekap Presensi Harian
     </h3>
     <div class="overflow-x-auto rounded border border-gray-200 bg-white">
      <table class="w-full border-collapse border border-gray-200 text-xs text-left text-gray-700">
       <thead class="bg-gray-100">
        <tr>
         <th class="border border-gray-200 px-4 py-2 font-semibold">No.</th>
         <th class="border border-gray-200 px-4 py-2 font-semibold">Nama</th>
         <th class="border border-gray-200 px-4 py-2 font-semibold">Tanggal</th>
         <th class="border border-gray-200 px-4 py-2 font-semibold">Jam Masuk</th>
         <th class="border border-gray-200 px-4 py-2 font-semibold">Jam Keluar</th>
         <th class="border border-gray-200 px-4 py-2 font-semibold">Status</th>
         {{-- <th class="border border-gray-200 px-4 py-2 font-semibold">Aksi</th> --}}
        </tr>
       </thead>
       <tbody>
        @php $counter = 1; @endphp
@foreach ($getDataAbsensi as $karyawan)
    @foreach ($karyawan->absensi as $absen)
        <tr>
            <td class="border border-gray-200 px-4 py-2">{{ $counter++ }}</td>
            <td class="border border-gray-200 px-4 py-2 font-semibold">{{ $karyawan->nama }}</td>
             <td class="border border-gray-200 px-4 py-2">{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ $absen->jam_masuk }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ $absen->jam_keluar ?? 'Belum ada data' }}</td>
            <td class="border border-gray-200 px-4 py-2 font-normal text-gray-800">{{ $absen->status }}</td>
        </tr>
    @endforeach
@endforeach
        
       </tbody>
      </table>
     </div>
    </section>
   </div>
  </main>
    <script>
   let hideTimeout;

  function toggleDropdown() {
    const dropdown = document.getElementById('dropdown');
    dropdown.classList.toggle('hidden');
  }

  function delayHideDropdown() {
    hideTimeout = setTimeout(() => {
      document.getElementById('dropdown').classList.add('hidden');
    }, 300);
  }

  function clearHideTimeout() {
    clearTimeout(hideTimeout);
  }

  document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('dropdown');
    const button = event.target.closest('button');
    const isDropdownClick = dropdown.contains(event.target);

    if (!isDropdownClick && !button) {
      dropdown.classList.add('hidden');
    }
  });
    </script>
</body>
</html>