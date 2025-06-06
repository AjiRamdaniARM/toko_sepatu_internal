<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class k_hadiran extends Model
{
    use HasFactory;
     protected $fillable = [
        'kode_karyawan',
        'Nama',
        'Alasan',
        'Catatan',
    ];

    public function karyawan(){
         return $this->belongsTo(Karyawan::class, 'kode_karyawan', 'kode_karyawan');
    }
}
