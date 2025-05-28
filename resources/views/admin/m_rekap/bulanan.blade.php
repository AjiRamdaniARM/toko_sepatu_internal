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
     Rekap Absensi Bulanan
    </h2>
    <form
     class="mb-6 flex flex-col sm:flex-row sm:items-center sm:space-x-4 space-y-4 sm:space-y-0"
    >
     <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-2">
      <label
       class="text-xs font-semibold text-gray-700 mb-1 sm:mb-0"
       for="filterMonth"
       >Pilih Bulan</label
      >
      <input
       class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600"
       id="filterMonth"
       name="filterMonth"
       type="month"
       value="2024-06"
      />
     </div>
     <button
      id="filterBtn"
      class="px-4 py-2 bg-blue-700 text-white text-sm rounded select-none hover:bg-blue-800"
      type="submit"
     >
      Filter
     </button>
    </form>
    <div class="overflow-x-auto rounded border border-gray-200 bg-white">
     <table
      class="w-full border-collapse border border-gray-200 text-xs text-left text-gray-700"
     >
      <thead class="bg-gray-100">
       <tr>
        <th class="border border-gray-200 px-4 py-2 font-semibold">No.</th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">Nama</th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">Bulan</th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">Hadir</th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">Alfa</th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">Izin</th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">Sakit</th>
        <th class="border border-gray-200 px-4 py-2 font-semibold">Aksi</th>
       </tr>
      </thead>
      <tbody id="tableBody">
       <tr>
        <td class="border border-gray-200 px-4 py-2">1</td>
        <td class="border border-gray-200 px-4 py-2 font-semibold">Budi</td>
        <td class="border border-gray-200 px-4 py-2">Juni 2024</td>
        <td class="border border-gray-200 px-4 py-2">20</td>
        <td class="border border-gray-200 px-4 py-2">1</td>
        <td class="border border-gray-200 px-4 py-2">0</td>
        <td class="border border-gray-200 px-4 py-2">1</td>
        <td class="border border-gray-200 px-4 py-2 space-x-1">
         <button
          class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800"
          type="button"
         >
          Detail
         </button>
         <button
          class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800"
          type="button"
         >
          Edit
         </button>
         <button
          class="px-2 py-0.5 bg-red-600 text-white text-xs rounded select-none hover:bg-red-700 delete-btn"
          type="button"
         >
          Hapus
         </button>
        </td>
       </tr>
       <tr>
        <td class="border border-gray-200 px-4 py-2">2</td>
        <td class="border border-gray-200 px-4 py-2 font-semibold">Elsa</td>
        <td class="border border-gray-200 px-4 py-2">Juni 2024</td>
        <td class="border border-gray-200 px-4 py-2">22</td>
        <td class="border border-gray-200 px-4 py-2">0</td>
        <td class="border border-gray-200 px-4 py-2">1</td>
        <td class="border border-gray-200 px-4 py-2">0</td>
        <td class="border border-gray-200 px-4 py-2 space-x-1">
         <button
          class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800"
          type="button"
         >
          Detail
         </button>
         <button
          class="px-2 py-0.5 bg-blue-700 text-white text-xs rounded select-none hover:bg-blue-800"
          type="button"
         >
          Edit
         </button>
         <button
          class="px-2 py-0.5 bg-red-600 text-white text-xs rounded select-none hover:bg-red-700 delete-btn"
          type="button"
         >
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