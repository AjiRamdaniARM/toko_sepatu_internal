<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
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
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard');


    Route::get('/dashboard/pegawai', [AdminController::class, 'pegawai'])->name('pegawai');
    Route::get('/dashboard/pegawai/create', [AdminController::class, 'pegawai_create'])->name('pegawai.create');

    // === sub menu ===
    Route::get('/dashboard/r_harian', [AdminController::class, 'r_harian'])->name('r_harian');
    Route::get('/dashboard/r_bulanan', [AdminController::class, 'r_bulanan'])->name('r_bulanan');
    Route::get('/dashboard/r_mingguan', [AdminController::class, 'r_mingguan'])->name('r_mingguan');
    
    

    Route::get('/dashboard/ketidak_hadiran', [AdminController::class, 'k_hadiran'])->name('ketidak_hadiran');

     Route::get('/dashboard/logout', [AdminController::class, 'logout'])->name('logout.admin');

});


// === akses login === //
Route::post('login/admin', [AuthController::class, 'AuthAdmin'])->name('login.admin');
Route::post('login/karyawan', [AuthController::class, 'AuthKaryawan'])->name('login.karyawan');