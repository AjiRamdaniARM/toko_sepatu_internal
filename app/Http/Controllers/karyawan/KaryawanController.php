<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\k_hadiran;
use App\Models\Karyawan;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

public function k_hadiran() {
    return view('karyawan.k_hadiran');
}

public function ketidak_hadiran_post(Request $request){
      $request->validate([
            // 'date' => 'required|date',
            'absenceType' => 'required|string',
            'reason' => 'required|string|max:1000',
        ]);

        // Simpan data ke database
        k_hadiran::create([
            'kode_karyawan' => auth()->user()->kode_karyawan ?? null, // Atau isi dengan ID siswa jika tersedia
            'Nama' => auth()->user()->name ?? 'Anonim', // Atau dari form input
            'Alasan' => ucfirst($request->absenceType),
            'Catatan' => $request->reason,
        ]);

        Absensi::create([
        'kode_karyawan' => auth()->user()->kode_karyawan ?? null,
        'tanggal' => now(),

        'status' => ucfirst($request->absenceType),
    ]);

        return redirect()->back()->with('success', 'Data ketidakhadiran berhasil dikirim.');
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


     // == sub menu 
   public function rekap_harian(Request $request)
{
    $filterDate = $request->input('filterDate'); // Format: YYYY-MM-DD
    $kodeKaryawan = Auth::user()->kode_karyawan;
    $getDataAbsensi = DB::table('absensis')
        ->where('absensis.kode_karyawan', $kodeKaryawan)
        ->when($filterDate, function ($query) use ($filterDate) {
            $query->whereDate('tanggal', $filterDate);
        })
        ->join('karyawans', 'absensis.kode_karyawan', '=', 'karyawans.kode_karyawan')
        ->select('absensis.*', 'karyawans.nama')
        ->orderBy('tanggal', 'desc')
        ->get();
    return view('karyawan.m_rekap.harian', compact('getDataAbsensi', 'filterDate'));
}

public function rekap_mingguan(Request $request)
{
     $startWeek = $request->input('startWeek'); // Format: YYYY-MM-DD
    $endWeek = $request->input('endWeek');     // Format: YYYY-MM-DD
    $kodeKaryawan = Auth::user()->kode_karyawan;

    $getDataAbsensi = DB::table('absensis')
        ->where('absensis.kode_karyawan', $kodeKaryawan)
        ->when($startWeek && $endWeek, function ($query) use ($startWeek, $endWeek) {
            $query->whereBetween('tanggal', [$startWeek, $endWeek]);
        })
        ->join('karyawans', 'absensis.kode_karyawan', '=', 'karyawans.kode_karyawan')
        ->select('absensis.*', 'karyawans.nama')
        ->orderBy('tanggal', 'desc')
        ->get();

    return view('karyawan.m_rekap.mingguan', compact('getDataAbsensi','startWeek','endWeek'));
}
public function rekap_bulanan(Request $request)
{
     $filterMonth = $request->input('filterMonth'); // Format: YYYY-MM
$kodeKaryawan = Auth::user()->kode_karyawan;
    $getDataAbsensi = Karyawan::where('kode_karyawan',$kodeKaryawan )
    ->with(['absensi' => function ($query) use ($filterMonth) {
        if (!empty($filterMonth)) {
            $year = substr($filterMonth, 0, 4);
            $month = substr($filterMonth, 5, 2);
            $query->whereYear('tanggal', $year)
                  ->whereMonth('tanggal', $month);
        }
    }])->get();

    return view('karyawan.m_rekap.bulanan', compact('getDataAbsensi', 'filterMonth'));
}





}
