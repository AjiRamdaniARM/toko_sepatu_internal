<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('admin.components.navbar')
        {{-- == main == --}}
 <main class="flex-grow bg-gray-50 flex items-center justify-center px-4 sm:px-6 lg:px-8 pt-20">
    <div class="max-w-md w-full bg-white rounded shadow p-8 text-center">
      <i class="fas fa-sign-out-alt text-5xl text-blue-700 mb-6"></i>
      <h1 class="text-2xl font-semibold text-gray-900 mb-4 select-none">
        Anda yakin ingin logout?
      </h1>
      <p class="text-gray-600 mb-6 select-none">
        Klik tombol Logout di bawah untuk keluar dari akun Anda.
      </p>
      <div class="flex justify-center space-x-4">
        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 select-none">
          Batal
        </button>
        <button type="button" class="px-6 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 select-none">
          Logout
        </button>
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