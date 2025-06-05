<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
     protected $fillable = [
        'kode_karyawan',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
    ];

    public function karyawan()
{
    return $this->belongsTo(Karyawan::class, 'kode_karyawan', 'kode_karyawan');
}
}
