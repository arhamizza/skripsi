<?php

namespace Database\Seeders;

use App\Models\TransaksiGuru as ModelsTransaksiGuru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsTransaksiGuru::create([
            "id_guru" => "1",
            "id_transaksi" => "1",
            "id_siswa" => "1",
            "Nilai_linguistik" => "1",
            "user_id" => "1",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_siswa" => "1",
            "Nilai_linguistik" => "10",
            "user_id" => "2",
            
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "3",
            "id_transaksi" => "1",
            "id_siswa" => "1",
            "Nilai_linguistik" => "22",
            "user_id" => "3",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "1",
            "id_transaksi" => "2",
            "id_siswa" => "2",
            "Nilai_linguistik" => "8",
            "user_id" => "1",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "2",
            "id_transaksi" => "2",
            "id_siswa" => "2",
            "Nilai_linguistik" => "8",
            "user_id" => "2",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "3",
            "id_transaksi" => "2",
            "id_siswa" => "2",
            "Nilai_linguistik" => "4",
            "user_id" => "3",
       ]);
        
    }
}
