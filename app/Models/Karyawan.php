<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Karyawan extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

     protected $fillable = [
        'kode_karyawan',
        'nama',
        'email',
        'password',
        'jabatan',
        'role',
        'departement_id',
        'tanggal_bergabung',
    ];
        public function departement()
        {
            return $this->belongsTo(Departemen::class);
        }

    public function absensi()
{
    return $this->hasMany(Absensi::class, 'kode_karyawan', 'kode_karyawan');
}
    public function k_hadiran()
{
    return $this->hasMany(k_hadiran::class, 'kode_karyawan', 'kode_karyawan');
}
}
