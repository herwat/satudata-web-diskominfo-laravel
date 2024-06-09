<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role_id' => 1, // Sesuaikan dengan role_id untuk admin
            'jabatan_id' => 1, // Sesuaikan dengan jabatan_id untuk admin
            'nip' => 123456789,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'jk' => 'L',
            'tempat_lahir' => 'City A',
            'tanggal_lahir' => '1980-01-01',
            'alamat' => 'Address A',
            'tanggal_bergabung' => '2020-01-01',
            'no_hp' => '081234567890',
            'gambar' => 'logo_sulsel.png',
            'status' => 'aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
