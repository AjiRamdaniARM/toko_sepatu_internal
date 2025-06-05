<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('admin.components.navbar')
        {{-- == main == --}}
 <main class="flex-grow bg-gray-50 min-h-[calc(100vh-96px)] py-6">
   <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 bg-white rounded shadow p-6">
    <h2 class="text-gray-900 font-semibold text-lg mb-6 select-none">Tambah Data Pegawai</h2>
    <form action="{{ route('admin.edited_pegawai_post',$getDataKaryawan->id)}}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="kode_karyawan" class="block text-xs font-semibold text-gray-700 mb-1">Kode Karyawan</label>
        <input type="text" id="kode_karyawan" name="kode_karyawan" placeholder="PEG-0006" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{$getDataKaryawan->kode_karyawan}}" />
    </div>
    <div>
        <label for="nama" class="block text-xs font-semibold text-gray-700 mb-1">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{$getDataKaryawan->nama}}" />
    </div>
    <div>
        <label for="email" class="block text-xs font-semibold text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email" placeholder="email@example.com" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{$getDataKaryawan->email}}" />
    </div>
    <div>
        <label for="password" class="block text-xs font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" 
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" />
        <small class="text-gray-500 text-xs">Kosongkan jika tidak ingin mengubah password</small>
    </div>

    <div>
        <label for="jabatan" class="block text-xs font-semibold text-gray-700 mb-1">Jabatan</label>
        <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{$getDataKaryawan->jabatan}}" />
    </div>
    <div>
        <label for="role" class="block text-xs font-semibold text-gray-700 mb-1">Role</label>
        <select id="role" name="role" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option value="{{$getDataKaryawan->role}}">{{$getDataKaryawan->role}}</option>
            <option value="Admin">Admin</option>
            <option value="Staff">Staff</option>
            <option value="Marketing">Marketing</option>
            <option value="Leader">Leader</option>
            <option value="CEO">CEO</option>
            <option value="Karyawan">Karyawan</option>
        </select>
    </div>
    <div>
        <label for="department_id" class="block text-xs font-semibold text-gray-700 mb-1">Department</label>
        <select id="department_id" name="department_id" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600">
            <option value="{{$getDataDepartment->id}}">{{$getDataDepartment->nama_departement}}</option>
            @foreach ($getDepartement as $Departemen )
            <option value="{{ $Departemen->id}}">{{ $Departemen->nama_departement}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="tanggal_bergabung" class="block text-xs font-semibold text-gray-700 mb-1">Tanggal Bergabung</label>
        <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{$getDataKaryawan->tanggal_bergabung}}" />
    </div>
    <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200">
        <button type="reset" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 select-none">Batal</button>
        <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded hover:bg-blue-800 select-none">Simpan</button>
    </div>
</form>

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