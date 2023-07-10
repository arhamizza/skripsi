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
            "id_nilai" => "1",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_nilai" => "2",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "3",
            "id_transaksi" => "1",
            "id_nilai" => "3",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "1",
            "id_transaksi" => "2",
            "id_nilai" => "4",
       ]);
        ModelsTransaksiGuru::create([
            "id_guru" => "2",
            "id_transaksi" => "2",
            "id_nilai" => "5",
       ]);
    }
}
