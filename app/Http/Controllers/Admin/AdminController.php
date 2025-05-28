<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        return view('admin.dashboard');
    }
    public function pegawai () {
        return view('admin.pegawai');
    }
    public function pegawai_create () {
        return view('admin.pegawai.create');
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

    }
}
