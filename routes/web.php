<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\karyawan\KaryawanController;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/pegawai', [AdminController::class, 'pegawai'])->name('pegawai');
    Route::get('/dashboard/pegawai/detail_pegawai/{id}', [AdminController::class, 'detail_pegawai'])->name('detail_pegawai');
    Route::get('/dashboard/pegawai/create', [AdminController::class, 'pegawai_create'])->name('pegawai.create');
    Route::post('/dashboard/pegawai/create/post', [AdminController::class, 'post_pegawai'])->name('post_pegawai');
    Route::get('/dashboard/pegawai/edited/{id}', [AdminController::class, 'edited_pegawai'])->name('edited_pegawai');
    Route::post('/dashboard/pegawai/edited/post/{id}', [AdminController::class, 'edited_pegawai_post'])->name('edited_pegawai_post');
    Route::post('/dashboard/pegawai/delete/post/{id}', [AdminController::class, 'delete_pegawai'])->name('delete_pegawai');

    // === sub menu ===
    Route::get('/dashboard/r_harian', [AdminController::class, 'r_harian'])->name('r_harian');
    Route::get('/dashboard/r_bulanan', [AdminController::class, 'r_bulanan'])->name('r_bulanan');
    Route::get('/dashboard/r_mingguan', [AdminController::class, 'r_mingguan'])->name('r_mingguan');
    
    Route::get('/dashboard/ketidak_hadiran', [AdminController::class, 'k_hadiran'])->name('ketidak_hadiran');
    Route::delete('/dashboard/ketidak_hadiran/delete/{id}', [AdminController::class, 'delete_k_hadiran'])->name('delete.ketidak_hadiran');
    Route::get('/dashboard/logout', [AdminController::class, 'logout'])->name('logout.admin');
    Route::post('/dashboard/logout/prosses', [AdminController::class, 'logoutPost'])->name('logout.admin.post');
    Route::get('/dashboard/report/pdf', [AdminController::class, 'pdfReport'])->name('pdfReport');
    Route::get('/dashboard/report/pdf-report-mingguan', [AdminController::class, 'pdfReportMingguan'])->name('pdfReportMingguan');
    Route::get('/dashboard/report/pdf_bulanan', [AdminController::class, 'pdfReportBulanan'])->name('pdfReportBulanan');
    Route::get('/dashboard/ketidak-hadiran/pdf', [AdminController::class, 'pdfReportKetidakhadiran'])->name('pdfReportKetidakhadiran');


});

// Route khusus karyawan
Route::middleware('auth:karyawan')->group(function () {
    Route::get('karyawan/dashboard',[KaryawanController::class, 'index'])->name('karyawan.dashboard');
    Route::get('karyawan/logout',[KaryawanController::class, 'logout'])->name('karyawan.logout');
    Route::get('/dashboard/ketidak_hadiran', [KaryawanController::class, 'k_hadiran'])->name('k_hadiran_karyawan');

    // post
    Route::post('karyawan/logout/post',[KaryawanController::class, 'post_logout'])->name('post_karyawan_logout');
    Route::post('karyawan/dashboard/absensi_masuk', [KaryawanController::class, 'absensi_masuk'])->name('absensi_masuk');
    Route::post('karyawan/dashboard/absensi_pulang', [KaryawanController::class, 'absensi_pulang'])->name('absensi_pulang');
    Route::get('karyawan/dashboard/cekStatus', [KaryawanController::class, 'statusAbsen'])->name('cekStatus');
    Route::post('karyawan/dashboard/ketidak_hadiran/post', [KaryawanController::class, 'ketidak_hadiran_post'])->name('ketidak_hadiran_post');
    Route::get('karyawan/dashboard/r_harian', [KaryawanController::class, 'rekap_harian'])->name('r_harian.karyawan');
    Route::get('karyawan/dashboard/rekap_mingguan', [KaryawanController::class, 'rekap_mingguan'])->name('rekap_mingguan.karyawan');
    Route::get('karyawan/dashboard/rekap_bulanan', [KaryawanController::class, 'rekap_bulanan'])->name('rekap_bulanan.karyawan');



    // === report pdf format
    Route::get('karyawan/dashboard/r_harian/report', [KaryawanController::class, 'pdfReport'])->name('reportPdf_harian');

});

// === akses login === //
Route::post('login/admin', [AuthController::class, 'AuthAdmin'])->name('login.admin');
Route::post('login/karyawan', [AuthController::class, 'AuthKaryawan'])->name('login.karyawan');