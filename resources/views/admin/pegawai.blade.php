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
    <button onclick="window.location.href='tambah-data.html'" class="mb-4 px-4 py-2 bg-blue-700 text-white text-sm rounded select-none hover:bg-blue-800" type="button">
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
         Nama
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Username
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Jabatan
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Role
        </th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">
         Aksi
        </th>
       </tr>
      </thead>
      <tbody class="bg-white">
       <tr>
        <td class="border border-gray-200 px-4 py-2">
         1
        </td>
        <td class="border border-gray-200 px-4 py-2 font-semibold">
         PEG-0001
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Budi
        </td>
        <td class="border border-gray-200 px-4 py-2 lowercase">
         Marketing
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Staff
        </td>
        <td class="border border-gray-200 px-4 py-2 space-x-1">
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Detail
         </button>
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Edit
         </button>
         <button class="px-2 py-0.5 bg-red-600 text-white text-xs rounded select-none hover:bg-red-700" type="button">
          Hapus
         </button>
        </td>
       </tr>
       <tr>
        <td class="border border-gray-200 px-4 py-2">
         2
        </td>
        <td class="border border-gray-200 px-4 py-2 font-semibold">
         PEG-0002
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Elsa
        </td>
        <td class="border border-gray-200 px-4 py-2 lowercase">
         Admin
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Admin
        </td>
        <td class="border border-gray-200 px-4 py-2 space-x-1">
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Detail
         </button>
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Edit
         </button>
         <button class="px-2 py-0.5 bg-red-600 text-white text-xs rounded select-none hover:bg-red-700" type="button">
          Hapus
         </button>
        </td>
       </tr>
       <tr>
        <td class="border border-gray-200 px-4 py-2">
         3
        </td>
        <td class="border border-gray-200 px-4 py-2 font-semibold">
         PEG-0003
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Rendi
        </td>
        <td class="border border-gray-200 px-4 py-2 lowercase">
         CEO
        </td>
        <td class="border border-gray-200 px-4 py-2">
         CEO
        </td>
        <td class="border border-gray-200 px-4 py-2 space-x-1">
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Detail
         </button>
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Edit
         </button>
         <button class="px-2 py-0.5 bg-red-600 text-white text-xs rounded select-none hover:bg-red-700" type="button">
          Hapus
         </button>
        </td>
       </tr>
       <tr>
        <td class="border border-gray-200 px-4 py-2">
         3
        </td>
        <td class="border border-gray-200 px-4 py-2 font-semibold">
         PEG-0004
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Dena
        </td>
        <td class="border border-gray-200 px-4 py-2 lowercase">
         Leader
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Leader
        </td>
        <td class="border border-gray-200 px-4 py-2 space-x-1">
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Detail
         </button>
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Edit
         </button>
         <button class="px-2 py-0.5 bg-red-600 text-white text-xs rounded select-none hover:bg-red-700" type="button">
          Hapus
         </button>
        </td>
       </tr>
       <tr>
        <td class="border border-gray-200 px-4 py-2">
         3
        </td>
        <td class="border border-gray-200 px-4 py-2 font-semibold">
         PEG-0005
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Zaki
        </td>
        <td class="border border-gray-200 px-4 py-2 lowercase">
         Karyawan
        </td>
        <td class="border border-gray-200 px-4 py-2">
         Karyawan
        </td>
        <td class="border border-gray-200 px-4 py-2 space-x-1">
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Detail
         </button>
         <button class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800" type="button">
          Edit
         </button>
         <button class="px-2 py-0.5 bg-red-600 text-white text-xs rounded select-none hover:bg-red-700" type="button">
          Hapus
         </button>
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