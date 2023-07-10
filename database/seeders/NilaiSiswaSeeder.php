<?php

namespace Database\Seeders;

use App\Models\NilaiSiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NilaiSiswa::create([
            "id_siswa" => "1",
            "Nilai_linguistik" => "3",
        ]);
        NilaiSiswa::create([
            "id_siswa" => "2",
            "Nilai_linguistik" => "2",
        ]);
        NilaiSiswa::create([
            "id_siswa" => "3",
            "Nilai_linguistik" => "1",
        ]);
        NilaiSiswa::create([
            "id_siswa" => "4",
            "Nilai_linguistik" => "6",
        ]);
        NilaiSiswa::create([
            "id_siswa" => "5",
            "Nilai_linguistik" => "1",
        ]);
    }
}
