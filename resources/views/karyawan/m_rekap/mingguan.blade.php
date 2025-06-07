<!DOCTYPE html>
<html lang="en">
<head>
    @include('karyawan.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('karyawan.components.navbar')
        {{-- == main == --}}
  <main class="bg-gray-50 min-h-[calc(100vh-96px)] py-6">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-gray-900 font-semibold text-lg mb-4 select-none">Rekap Absensi Mingguan</h2>

    <form method="GET" action="{{ route('rekap_mingguan.karyawan') }}"
        class="mb-6 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-4 sm:space-y-0">

      <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
        <label class="text-xs font-semibold text-gray-700 mb-1 sm:mb-0" for="startWeek">Mulai Minggu</label>
        <input
          class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
          id="startWeek"
          name="startWeek"
          type="date"
          value="{{ request('startWeek', '2024-06-01') }}"
        />
      </div>

      <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
        <label class="text-xs font-semibold text-gray-700 mb-1 sm:mb-0" for="endWeek">Akhir Minggu</label>
        <input
          class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
          id="endWeek"
          name="endWeek"
          type="date"
          value="{{ request('endWeek', '2024-06-07') }}"
        />
      </div>

      <button type="submit"
        class="px-4 py-2 bg-blue-700 text-white text-sm rounded select-none hover:bg-blue-800">
        Filter
      </button>
    </form>

    <div class="overflow-x-auto rounded border border-gray-200 bg-white">
      @php
        $statusCount = ['Hadir' => 0, 'Izin' => 0, 'Sakit' => 0];
      @endphp

      @foreach ($getDataAbsensi as $absensi)
        @php
          if (isset($statusCount[$absensi->status])) {
              $statusCount[$absensi->status]++;
          }
        @endphp
      @endforeach

      <table class="w-full border-collapse border border-gray-200 text-xs text-left text-gray-700">
        <thead class="bg-gray-100">
          <tr>
            <th class="border border-gray-200 px-4 py-2 font-semibold">No.</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Nama</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Minggu</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Hadir</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Izin</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Sakit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border border-gray-200 px-4 py-2">1</td>
            <td class="border border-gray-200 px-4 py-2 font-semibold">
              {{ $getDataAbsensi->first()->nama ?? '-' }}
            </td>
            <td class="border border-gray-200 px-4 py-2">
              {{ \Carbon\Carbon::parse($startWeek)->translatedFormat('j F') }} - 
              {{ \Carbon\Carbon::parse($endWeek)->translatedFormat('j F Y') }}
            </td>
            <td class="border border-gray-200 px-4 py-2">{{ $statusCount['Hadir'] }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ $statusCount['Izin'] }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ $statusCount['Sakit'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>

  <script>
   const dropdownBtn = document.getElementById("rekapBtn");
   const dropdownMenu = document.getElementById("dropdown");
   let hideTimeout;

   function toggleDropdown() {
    const isHidden = dropdownMenu.classList.contains("hidden");
    if (isHidden) {
     dropdownMenu.classList.remove("hidden");
     dropdownBtn.setAttribute("aria-expanded", "true");
    } else {
     dropdownMenu.classList.add("hidden");
     dropdownBtn.setAttribute("aria-expanded", "false");
    }
   }

   function delayHideDropdown() {
    hideTimeout = setTimeout(() => {
     dropdownMenu.classList.add("hidden");
     dropdownBtn.setAttribute("aria-expanded", "false");
    }, 300);
   }

   function clearHideTimeout() {
    clearTimeout(hideTimeout);
   }

   dropdownBtn.addEventListener("click", (e) => {
    e.preventDefault();
    toggleDropdown();
   });

   document.addEventListener("click", (e) => {
    if (!e.target.closest("#rekapBtn") && !e.target.closest("#dropdown")) {
     dropdownMenu.classList.add("hidden");
     dropdownBtn.setAttribute("aria-expanded", "false");
    }
   });
   document.querySelectorAll(".delete-btn").forEach((btn) => {
    btn.addEventListener("click", (e) => {
     const row = e.target.closest("tr");
     if (
      confirm(
       "Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan."
      )
     ) {
      row.remove();
     }
    });
   });
  </script>
</body>
</html>