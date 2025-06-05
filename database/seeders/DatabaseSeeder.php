<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
         DB::table('karyawan')->insert([
            [
                'kode_karyawan' => 'admin',
                'nama' => 'admin@gmail.com',
                'email' => Hash::make('12345678'),
                'password' => Hash::make('12345678'),
                'jabatan' => 'staff',
                'role' => 'leader',
                'department_id' => 22295,
                'tanggal_bergabung' => now(),
                 'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
