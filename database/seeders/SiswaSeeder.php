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
            "nama_siswa" => "VENISA GLADIS SETIAWAN",
        ]);
        Siswa::create([
            "id_kelas" => "2",
            "nama_siswa" => "BAGUS SETYO BUDI",
        ]);
        Siswa::create([
            "id_kelas" => "13",
            "nama_siswa" => "ELANG SHALAHUDIN ALFARUQ",
        ]);
        Siswa::create([
            "id_kelas" => "10",
            "nama_siswa" => "GILANG SURYA SENA",
        ]);
        Siswa::create([
            "id_kelas" => "11",
            "nama_siswa" => "ADINDA LATIFATUL NAJWA",
        ]);
        Siswa::create([
            "id_kelas" => "17",
            "nama_siswa" => "DIAZ JULIA PUTRI",
        ]);
        Siswa::create([
            "id_kelas" => "17",
            "nama_siswa" => "LATIFATUL NUR AZIZAH",
        ]);
        Siswa::create([
            "id_kelas" => "17",
            "nama_siswa" => "RAMA SINATRIA",
        ]);
        Siswa::create([
            "id_kelas" => "17",
            "nama_siswa" => "SABIKHA KEISYA AULIA",
        ]);
        Siswa::create([
            "id_kelas" => "24",
            "nama_siswa" => "KAELA PUTRI RAMADANI",
        ]);
    }
}
