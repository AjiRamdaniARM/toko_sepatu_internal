<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Departemen;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index () {
        // count data absensi
        $countKaryawan = Absensi::where('status','Hadir')->count();
        $countKaryawanAlfa = Absensi::where('status','Alfa')->count();
        $countKaryawanIzin = Absensi::where('status','Izin')->count();
       $getDataAbsensi = Karyawan::with('absensi')->get();

        return view('admin.dashboard',compact('countKaryawan','countKaryawanAlfa','countKaryawanIzin','getDataAbsensi'));
    }
    public function pegawai () {
       $getPegawai = Karyawan::orderBy('nama', 'asc')->get();
        return view('admin.pegawai', compact('getPegawai'));
    }
    public function detail_pegawai($id)
    {
        $getDataKaryawan = Karyawan::with('departement')->findOrFail($id);

        return view('admin.pegawai.detail', compact('getDataKaryawan'));
    }

    public function pegawai_create () {
        $getDepartement = Departemen::orderBy('nama_departement', 'asc')->get();
        return view('admin.pegawai.create' ,compact('getDepartement'));
}

   public function post_pegawai(Request $request_pegawai)
    {
        Karyawan::create([
            'kode_karyawan' => $request_pegawai->kode_karyawan,
            'nama' => $request_pegawai->nama,
            'email' => $request_pegawai->email,
            'password' => Hash::make($request_pegawai->password),
            'jabatan' => $request_pegawai->jabatan,
            'role' => $request_pegawai->role,
            'departement_id' => $request_pegawai->department_id,
            'tanggal_bergabung' => $request_pegawai->tanggal_bergabung,
        ]);

        return redirect()->route('admin.pegawai')->with('success', 'Data karyawan berhasil disimpan.');
    }
    
    public function edited_pegawai($id) {
        $getDataKaryawan = Karyawan::find($id);
        $getDataDepartment = Departemen::where('id',$getDataKaryawan->departement_id)->first();
        $getDepartement = Departemen::orderBy('nama_departement', 'asc')->get();
        return view('admin.pegawai.edit', compact('getDepartement','getDataKaryawan','getDataDepartment'));
    }
    public function edited_pegawai_post(Request $request, $id)
    {
        // Validasi data (opsional tapi disarankan)
        $request->validate([
            'kode_karyawan' => 'required|string',
            'nama' => 'required|string',
            'email' => 'required|email',
            'jabatan' => 'required|string',
            'role' => 'required|string',
            'department_id' => 'required|integer',
            'tanggal_bergabung' => 'required|date',
            'password' => 'nullable|string', // Boleh kosong, tapi jika diisi minimal 6 karakter
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->kode_karyawan = $request->kode_karyawan;
        $karyawan->nama = $request->nama;
        $karyawan->email = $request->email;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->role = $request->role;
        $karyawan->departement_id = $request->department_id;
        $karyawan->tanggal_bergabung = $request->tanggal_bergabung;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $karyawan->password = Hash::make($request->password);
        }

        $karyawan->save();

        return redirect()->route('admin.pegawai')->with('success', 'Data karyawan berhasil diperbarui.');
    }
    public function delete_pegawai($id){
        $pegawai = Karyawan::find($id);
        $pegawai->delete();
        return redirect()->back()->with('success', 'Data karyawan berhasil dihapus.');
    }

    // == sub menu 
    public function r_harian() {
         return view('admin.m_rekap.harian');
    }
    public function r_bulanan() {
          return view('admin.m_rekap.bulanan');
    }
    public function r_mingguan() {
          return view('admin.m_rekap.mingguan');
    }

    public function k_hadiran() {
         return view('admin.k_hadiran');
    }
    public function logout() {
         return view('admin.logout');
    }

    // === function crud === 
    public function logoutPost() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
