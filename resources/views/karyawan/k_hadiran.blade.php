<!DOCTYPE html>
<html lang="en">
<head>
    @include('karyawan.components.header') 
</head>
<body class="bg-white text-gray-700">
    @include('karyawan.components.navbar')
        {{-- == main == --}}
  <main class="px-4 sm:px-6 lg:px-8 pt-6 max-w-5xl mx-auto flex-grow flex flex-col">
    <section id="formSection" class="mt-10 bg-white rounded-2xl shadow-xl p-10 max-w-2xl w-full mx-auto border border-gray-200">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Formulir Ketidakhadiran</h2>
      <form action="{{ route('ketidak_hadiran_post')}}" class="space-y-6 text-base" method="post">
        @csrf
        <div>
          <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Ketidakhadiran</label>
          <input
            type="date"
            id="date"
            name="date"
            required
            class="w-full border border-gray-300 rounded-md px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
            
          />
        </div>

        <div>
          <label for="absenceType" class="block text-sm font-medium text-gray-700 mb-2">Jenis Ketidakhadiran</label>
          <select
            id="absenceType"
            name="absenceType"
            required
            class="w-full border border-gray-300 rounded-md px-4 py-3 text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
          >
            <option value="" disabled selected>Pilih jenis ketidakhadiran</option>
            <option value="sakit">Sakit</option>
            <option value="izin">Izin</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </div>

        <div>
          <label for="reason" class="block text-sm font-medium text-gray-700 mb-2">Alasan Ketidakhadiran</label>
          <textarea
            id="reason"
            name="reason"
            rows="5"
            placeholder="Tuliskan alasan Anda tidak hadir..."
            required
            class="w-full border border-gray-300 rounded-md px-4 py-3 text-base resize-y focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
          ></textarea>
        </div>

        <button
          type="submit"
          class="bg-blue-600 text-white text-base font-semibold px-6 py-3 rounded-md hover:bg-blue-700 transition w-full shadow-md"
        >
          Kirim Alasan
        </button>
      </form>
    </section>
  </main>

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const dateInput = document.getElementById('date');
      const today = new Date().toISOString().split('T')[0];
      dateInput.value = today;
    });

    const form = document.getElementById('absenceForm');

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const date = form.date.value;
      const absenceType = form.absenceType.value;
      const reason = form.reason.value.trim();

      if (!date) {
        alert('Mohon pilih tanggal ketidakhadiran.');
        return;
      }
      if (!absenceType) {
        alert('Mohon pilih jenis ketidakhadiran.');
        return;
      }
      if (!reason) {
        alert('Mohon isi alasan ketidakhadiran.');
        return;
      }

      alert(`Jenis ketidakhadiran: ${absenceType}\nTanggal: ${date}\nAlasan:\n${reason}`);
      form.reset();
      form.date.value = new Date().toISOString().split('T')[0];
    });
  </script>
</body>
</html>