<?php

namespace Database\Seeders;

use App\Models\TransaksiSiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class transaksisiswaseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiSiswa::create([
            "id_transaksi" => "1",
            "id_siswa" => "1",
       ]);
       TransaksiSiswa::create([
            "id_transaksi" => "1",
            "id_siswa" => "2",
       ]);
    }
}
