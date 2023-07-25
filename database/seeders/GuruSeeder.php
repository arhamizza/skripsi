<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            "nama_guru" => "Saidatul Mar'ah S.Pd.I",
        ]);
        Guru::create([
            "nama_guru" => "Yeni Mustika Wijaya, S.Pd",
        ]);
        Guru::create([
            "nama_guru" => "Elies Andarwati M.Pd",
        ]);
        Guru::create([
            "nama_guru" => "Anik Yusmiarti S.Pd",
        ]);
        Guru::create([
            "nama_guru" => "Miftahuk Muslimah M.Pd",
        ]);
        Guru::create([
            "nama_guru" => "Edi Haryanto, S,Pd ",
        ]);
        Guru::create([
            "nama_guru" => "Miftahul Huda S,Pd",
        ]);
        Guru::create([
            "nama_guru" => "Eko Novryanto, S.Kom",
        ]);
    }
}
