<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryawanController extends Controller
{
    public function index () {
        return view('karyawan.index');
    }

    public function logout () {
         return view('karyawan.logout');
    }
   public function statusAbsen()
{
    $userId = auth()->id();
    $today = now()->toDateString();

    $absen = Absensi::where('user_id', $userId)->where('tanggal', $today)->first();

    return response()->json([
        'masuk' => $absen && $absen->waktu_masuk,
        'keluar' => $absen && $absen->waktu_keluar,
    ]);
}


    public function absensi_masuk (Request $request) {
       $kodeKaryawan = Auth::user()->kode_karyawan; // Asumsi user login punya kolom ini


$validated = $request->validate([
        'tanggal' => 'required|date',
        'waktu' => 'required'
    ]);
    $cek = Absensi::where('kode_karyawan', $kodeKaryawan)
        ->where('tanggal', $validated['tanggal'])
        ->first();

    if ($cek) {
        return response()->json(['message' => 'Sudah absen hari ini'], 409);
    }

    Absensi::create([
        'kode_karyawan' => $kodeKaryawan,
        'tanggal' => $validated['tanggal'],
        'jam_masuk' => $validated['waktu'],
        'status' => 'Hadir'
    ]);

    return response()->json(['message' => 'Absen masuk berhasil']);

    }
public function absensi_pulang(Request $request)
{
    $kodeKaryawan = Auth::user()->kode_karyawan;

    $validated = $request->validate([
        'tanggal' => 'required|date',
        'waktu' => 'required'
    ]);


    // Ambil record absensi hari ini
    $absensi = Absensi::where('kode_karyawan', $kodeKaryawan)
        ->where('tanggal', $validated['tanggal'])
        ->first();

    if (!$absensi || !$absensi->jam_masuk) {
        return response()->json(['message' => 'Anda belum absen masuk hari ini'], 409);
    }

    if ($absensi->jam_keluar) {
        return response()->json(['message' => 'Anda sudah absen pulang hari ini'], 409);
    }

    // Update jam keluar
    $absensi->update([
        'jam_keluar' => $validated['waktu'],
    ]);

    return response()->json(['message' => 'Absen pulang berhasil']);
}




    public function post_logout(Request $request) {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('karyawan')->check()) {
            Auth::guard('karyawan')->logout();
        }

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/'); // Atau ke login page
    }
}
