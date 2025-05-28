<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('admin.components.navbar')
        {{-- == main == --}}
  <main class="bg-gray-50 min-h-[calc(100vh-96px)] py-8">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6 text-gray-600 text-sm select-none">
      <p>Hari/Tanggal: <span id="currentDate"></span></p>
    </div>

    <!-- Filter Tanggal -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
      <div>
        <label for="startDate" class="block text-xs font-semibold text-gray-700 mb-1">Mulai Tanggal</label>
        <input type="date" id="startDate" name="startDate"
          class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>
      <div>
        <label for="endDate" class="block text-xs font-semibold text-gray-700 mb-1">Sampai Tanggal</label>
        <input type="date" id="endDate" name="endDate"
          class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" />
      </div>
      <div class="flex items-end">
        <button type="submit"
          class="w-full sm:w-auto px-4 py-2 bg-blue-700 text-white text-sm rounded hover:bg-blue-800">Filter</button>
      </div>
    </div>
    <h2 class="text-gray-900 font-semibold text-lg mb-4 select-none">Data Ketidakhadiran</h2>

    <!-- Tabel Ketidakhadiran -->
    <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-200 text-sm text-left text-gray-700">
        <thead class="bg-white">
          <tr>
            <th class="border border-gray-200 px-4 py-2 font-semibold">No.</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Kode ID</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Nama</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Alasan</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Catatan</th>
            <th class="border border-gray-200 px-4 py-2 font-semibold">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr>
            <td class="border border-gray-200 px-4 py-2">1</td>
            <td class="border border-gray-200 px-4 py-2 font-semibold">PEG-0001</td>
            <td class="border border-gray-200 px-4 py-2">Budi</td>
            <td class="border border-gray-200 px-4 py-2">Alfa</td>
            <td class="border border-gray-200 px-4 py-2">Tidak hadir tanpa keterangan</td>
            <td class="border border-gray-200 px-4 py-2 space-x-1">
              <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded hover:bg-blue-800">Edit</button>
              <button class="px-2 py-0.5 bg-red-600 text-white text-xs rounded hover:bg-red-700">Hapus</button>
            </td>
          </tr>
          <tr>
            <td class="border border-gray-200 px-4 py-2">2</td>
            <td class="border border-gray-200 px-4 py-2 font-semibold">PEG-0002</td>
            <td class="border border-gray-200 px-4 py-2">Rendi</td>
            <td class="border border-gray-200 px-4 py-2">Sakit</td>
            <td class="border border-gray-200 px-4 py-2">Sakit, ada keterangan dokter</td>
            <td class="border border-gray-200 px-4 py-2 space-x-1">
              <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded hover:bg-blue-800">Edit</button>
              <button class="px-2 py-0.5 bg-red-600 text-white text-xs rounded hover:bg-red-700">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
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

document.addEventListener('click', function(event) {
  const dropdown = document.getElementById('dropdown');
  const dropdownButton = document.getElementById('dropdownButton');

  if (!dropdown.contains(event.target) && !dropdownButton.contains(event.target)) {
    dropdown.classList.add('hidden');
  }
});

const currentDateElement = document.getElementById("currentDate");
if (currentDateElement) {
  const today = new Date();
  const formattedDate = today.toLocaleDateString("id-ID", {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric"
  });
  currentDateElement.textContent = formattedDate;
}
</script>
</body>
</html>