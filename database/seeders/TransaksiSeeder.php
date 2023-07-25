<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaksi::create([
            "kode" => "01",
            "id_kelas" => "25",
            'tanggal' => Carbon::parse('2023-01-01'),
            "Nama" => "Pemilihan Siswa Terbaik Seluruh Kelas",
            "Keterangan" => "Pemilihan ini ditujukan untuk memilih siswa terbaik yang diusulkan untuk mendapatkan beasiswa KEMRISTEKDIKTI",
        ]);
    }
}
