<!DOCTYPE html>
<html lang="en">
<head>
    @include('karyawan.components.header') 

</head>
<body class="bg-white text-gray-700">
    @include('karyawan.components.navbar')

    <main class="px-4 sm:px-10 lg:px-8 pt-20 max-w-4xl mx-auto flex-grow">
        <div class="mb-8 flex items-center justify-start space-x-6">
            <h1 class="text-2xl font-semibold text-gray-900 whitespace-nowrap">Presensi Hari Ini</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start justify-items-center">
            <!-- Presensi Masuk -->
            <div class="bg-white rounded-xl shadow-md p-6 w-full max-w-sm text-center flex flex-col justify-between min-h-[280px]">
                <p class="text-gray-500 text-xs mb-2 font-medium tracking-wide text-left">Presensi masuk</p>
                <p class="text-gray-900 text-base font-medium" id="tanggal"></p>
                <p class="text-gray-800 font-semibold text-3xl my-4" id="time">--:--:--</p>
                <button type="button" id="btnMasuk"
                        class="bg-blue-600 text-white text-sm font-semibold px-6 py-2 rounded-md hover:bg-blue-700 transition w-full mt-auto hidden">
                    MASUK
                </button>
            </div>

            <!-- Presensi Keluar -->
            <div class="bg-white rounded-xl shadow-md p-6 w-full max-w-sm text-center flex flex-col justify-between min-h-[280px]">
                <p class="text-gray-500 text-xs mb-2 font-medium tracking-wide text-left">Presensi keluar</p>
                <div class="flex justify-center items-center mb-4">
                    <div id="iconKeluar" class="w-12 h-12 border-2 border-black rounded-full flex justify-center items-center">
                        <i class="fas fa-times text-black text-2xl"></i>
                    </div>
                </div>
                <p class="text-gray-900 text-sm font-semibold mb-4" id="textKeluar">Belum waktunya pulang</p>
                <button type="button" id="btnKeluar"
                        class="hidden mt-2 bg-blue-600 text-white text-sm font-semibold px-6 py-2 rounded-md hover:bg-blue-700 transition w-full">
                    PULANG
                </button>
            </div>
        </div>
    </main>
<script>
const btnMasuk = document.getElementById('btnMasuk');
const btnKeluar = document.getElementById('btnKeluar');
const iconKeluar = document.getElementById('iconKeluar');
const textKeluar = document.getElementById('textKeluar');
const timeEl = document.getElementById('time');
const Tanggal = document.getElementById('tanggal');

let now = new Date();
let currentTime = '';
let currentDate = now.toISOString().split('T')[0];

let statusAbsen = {
    masuk: false,
    keluar: false
};

// 🔁 Cek status absen dari server berdasarkan user login
function fetchStatusAbsen() {
    fetch('/karyawan/dashboard/status_absen')
        .then(res => res.json())
        .then(data => {
            statusAbsen = data;
            updateTime();
        })
        .catch(err => {
            console.error('Gagal memuat status absen:', err);
        });
}

// ⏰ Fungsi update waktu dan tombol
function updateTime() {
    now = new Date(25,5,5, 16,0,0); // gunakan waktu asli
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');

    currentTime = `${hours}:${minutes}:${seconds}`;
    currentDate = now.toISOString().split('T')[0];
    timeEl.textContent = currentTime;

    // Tampilkan tanggal lengkap
    const hari = now.toLocaleDateString('id-ID', { weekday: 'long' });
    const tanggal = now.getDate().toString().padStart(2, '0');
    const bulan = now.toLocaleString('id-ID', { month: 'long' });
    const tahun = now.getFullYear();
    Tanggal.textContent = `${hari}, ${tanggal} ${bulan} ${tahun}`;

    // Atur tombol masuk
    if ((hours >= 6 && hours < 8) || (minutes < 1)) {
        if (statusAbsen.masuk) {
            btnMasuk.textContent = 'Anda sudah absen masuk, tunggu besok';
            btnMasuk.disabled = true;
        } else {
            btnMasuk.textContent = 'Absen Masuk';
            btnMasuk.disabled = false;
        }
        btnMasuk.classList.remove('hidden');
    } else {
        btnMasuk.classList.add('hidden');
    }

    // Atur tombol keluar
    if (hours >= 16) {
        if (statusAbsen.keluar) {
            btnKeluar.textContent = 'Anda sudah absen pulang, tunggu besok';
            btnKeluar.disabled = true;
            textKeluar.textContent = '';
        } else {
            btnKeluar.textContent = 'Absen Pulang';
            btnKeluar.disabled = false;
            textKeluar.textContent = 'Silakan tekan tombol pulang';
        }

        iconKeluar.classList.remove('border-black');
        iconKeluar.classList.add('border-blue-600');
        btnKeluar.classList.remove('hidden');
    } else {
        btnKeluar.classList.add('hidden');
        iconKeluar.classList.remove('border-blue-600');
        iconKeluar.classList.add('border-black');
        textKeluar.textContent = 'Belum waktunya pulang';
    }
}

// 🔁 Jalankan saat pertama load
fetchStatusAbsen();
setInterval(updateTime, 1000);

// ✅ Absen masuk
btnMasuk.addEventListener('click', () => {
    fetch('/karyawan/dashboard/absensi_masuk', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            tanggal: currentDate,
            waktu: currentTime
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message || 'Absensi masuk berhasil!');
        fetchStatusAbsen(); // refresh status dari server
    })
    .catch(err => alert('Gagal absen masuk: ' + err.message));
});

// ✅ Absen pulang
btnKeluar.addEventListener('click', () => {
    fetch('/karyawan/dashboard/absensi_pulang', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            tanggal: currentDate,
            waktu: currentTime
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message || 'Absensi pulang berhasil!');
        fetchStatusAbsen(); // refresh status dari server
    })
    .catch(err => alert('Gagal absen pulang: ' + err.message));
});
</script>



</body>
</html>
