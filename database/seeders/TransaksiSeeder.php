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
            "id_kelas" => "1",
            'tanggal' => Carbon::parse('2000-01-01'),
            "Nama" => "Pemilihan Siswa Terbaik Kelas 1A:",
            "Keterangan" => "Pemilihan ini ditujukan untuk memilih siswa terbaik yang diusulkan untuk mendapatkan beasiswa KEMRISTEKDIKTI",
        ]);
        Transaksi::create([
            "id_kelas" => "1",
            'tanggal' => Carbon::parse('2000-01-01'),
            "Nama" => "Pemilihan Siswa Terbaik Kelas 1A:",
            "Keterangan" => "Pemilihan ini ditujukan untuk memilih siswa terbaik yang diusulkan untuk mendapatkan beasiswa KEMRISTEKDIKTI",
        ]);
        Transaksi::create([
            "id_kelas" => "1",
            'tanggal' => Carbon::parse('2000-01-01'),
            "Nama" => "Pemilihan Siswa Terbaik Kelas 1A:",
            "Keterangan" => "Pemilihan ini ditujukan untuk memilih siswa terbaik yang diusulkan untuk mendapatkan beasiswa KEMRISTEKDIKTI",
        ]);
    }
}
