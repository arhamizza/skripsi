<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            "id_kelas" => "1",
            "nama_siswa" => "AGIS KRIS NANTO",
        ]);
        Siswa::create([
            "id_kelas" => "1",
            "nama_siswa" => "ALVIANO DWI HANGGORO",
        ]);
        Siswa::create([
            "id_kelas" => "1",
            "nama_siswa" => "AMADEO DARIUS EVANS REVANSA",
        ]);
    }
}
