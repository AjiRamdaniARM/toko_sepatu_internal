<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('admin.components.navbar')
        {{-- == main == --}}
 <main class="flex-grow bg-gray-50 min-h-[calc(100vh-96px)] py-10">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg p-6">
      <h2 class="text-xl font-semibold text-gray-900 mb-6 select-none">Detail Data Pegawai</h2>

      <div class="space-y-5 text-sm text-gray-800">
        <div>
          <p class="text-xs text-gray-500 mb-1 font-semibold">Kode Karyawan</p>
          <p class="border border-gray-200 rounded px-3 py-2 bg-gray-50">{{ $getDataKaryawan->kode_karyawan }}</p>
        </div>

        <div>
          <p class="text-xs text-gray-500 mb-1 font-semibold">Nama</p>
          <p class="border border-gray-200 rounded px-3 py-2 bg-gray-50">{{ $getDataKaryawan->nama }}</p>
        </div>

        <div>
          <p class="text-xs text-gray-500 mb-1 font-semibold">Email</p>
          <p class="border border-gray-200 rounded px-3 py-2 bg-gray-50">{{ $getDataKaryawan->email }}</p>
        </div>

        <div>
          <p class="text-xs text-gray-500 mb-1 font-semibold">Jabatan</p>
          <p class="border border-gray-200 rounded px-3 py-2 bg-gray-50">{{ $getDataKaryawan->jabatan }}</p>
        </div>

        <div>
          <p class="text-xs text-gray-500 mb-1 font-semibold">Role</p>
          <p class="border border-gray-200 rounded px-3 py-2 bg-gray-50">{{ $getDataKaryawan->role }}</p>
        </div>

        <div>
          <p class="text-xs text-gray-500 mb-1 font-semibold">Department</p>
          <p class="border border-gray-200 rounded px-3 py-2 bg-gray-50">
            {{ $getDataDepartment->nama_departement ?? '-' }}
          </p>
        </div>

        <div>
          <p class="text-xs text-gray-500 mb-1 font-semibold">Tanggal Bergabung</p>
          <p class="border border-gray-200 rounded px-3 py-2 bg-gray-50">
            {{ \Carbon\Carbon::parse($getDataKaryawan->tanggal_bergabung)->format('d M Y') }}
          </p>
        </div>
      </div>

      <div class="mt-6 text-right">
        <a href="{{ route('admin.pegawai') }}" class="text-sm text-blue-600 hover:underline">← Kembali ke daftar</a>
      </div>
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