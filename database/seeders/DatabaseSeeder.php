<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan data admin
        Admin::create([
            'name' => 'Admin',
            'nip' => '1413914',
            'password' => Hash::make('admin'), // Gantilah 'password' dengan password yang diinginkan
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Dosen::create([
            'name' => 'Dosen',
            'nidn' => 'dosen',
            'password' => Hash::make('dosen'), // Gantilah 'password' dengan password yang diinginkan
            'role' => 'dosen',
            'jabatan' => 'Dosen',
            'bidang_keahlian' => 'nganggur',
            'foto' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Mahasiswa::create([
            'nim' => '2131730085',
            'nama' => 'Nada',
            'password' => Hash::make('nada'), // Gantilah 'password' dengan password yang diinginkan
            'role' => 'mahasiswa',
            'tahun_masuk' => '2021',
            'foto' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
