<?php

namespace Database\Seeders;

use App\Models\TransaksiGuruSiswa ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiGuruSiswa::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_siswa" => "1",
            "id_kriteria" => "1",
            "nilai" => "1",
       ]);
        TransaksiGuruSiswa::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_siswa" => "1",
            "id_kriteria" => "2",
            "nilai" => "10",
            
       ]);
        TransaksiGuruSiswa::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_siswa" => "1",
            "id_kriteria" => "3",
            "nilai" => "22",
       ]);
        TransaksiGuruSiswa::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_siswa" => "2",
            "id_kriteria" => "1",
            "nilai" => "8",
       ]);
        TransaksiGuruSiswa::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_siswa" => "2",
            "id_kriteria" => "2",
            "nilai" => "8",
       ]);
        TransaksiGuruSiswa::create([
            "id_guru" => "2",
            "id_transaksi" => "1",
            "id_siswa" => "2",
            "id_kriteria" => "3",
            "nilai" => "4",
       ]);
        
    }
}
