<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('admin.components.navbar')
        {{-- == main == --}}
  <main class="bg-gray-50 min-h-[calc(100vh-96px)] py-6">
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-gray-900 font-semibold text-lg mb-4 select-none">
     Data Pegawai
    </h2>
    <button onclick="window.location.href='{{ route('admin.pegawai.create')}}'" class="mb-4 px-4 py-2 bg-blue-700 text-white text-sm rounded select-none hover:bg-blue-800" type="button">
     <i class="fas fa-plus-square mr-1">
     </i>
     Tambah Data
    </button>
    <div class="overflow-x-auto">
     <table class="w-full border-collapse border border-gray-200 text-xs text-left text-gray-700">
      <thead class="bg-white">
       <tr>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         No.
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Kode Karyawan
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Nama Lengkap
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Email
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Role
        </th>
         <th class="border border-gray-200 px-4 py-2 font-semibold">
         Jabatan
        </th>
        
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Aksi
        </th>
       </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($getPegawai as $pegawai )
          <tr>
          <td class="border border-gray-200 px-4 py-2">
           {{ $loop->iteration }}
          </td>
          <td class="border border-gray-200 px-4 py-2 font-semibold">
          {{$pegawai->kode_karyawan}}
          </td>
          <td class="border border-gray-200 px-4 py-2">
          {{$pegawai->nama}}
          </td>
          <td class="border border-gray-200 px-4 py-2 lowercase">
           {{$pegawai->email}}
          </td>
          <td class="border border-gray-200 px-4 py-2">
           {{$pegawai->jabatan}}
          </td>
          <td class="border border-gray-200 px-4 py-2">
           {{$pegawai->role}}
          </td>
          <td class="border border-gray-200 px-4 py-2">
            <div class="flex space-x-1">
              <button onclick="window.location.href='{{ route('admin.detail_pegawai', $pegawai->id)}}'" class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded hover:bg-blue-800" type="button">
                Detail
              </button>

              <button onclick="window.location.href='{{ route('admin.edited_pegawai', $pegawai->id)}}'" class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded hover:bg-blue-800" type="button">
                Edit
              </button>

              <form action="{{ route('admin.delete_pegawai', $pegawai->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                @csrf
                <button type="submit" class="px-2 py-0.5 bg-red-600 text-white text-xs rounded hover:bg-red-700">
                  Hapus
                </button>
              </form>
            </div>
          </td>

          </tr>
        @endforeach
       
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