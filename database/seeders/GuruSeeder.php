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
            "nama_guru" => "Anik Yusmiarti S.Pd",
            "bobot" => "0.5",
        ]);
        Guru::create([
            "nama_guru" => "Yeni Mustika Wijaya, S.Pd",
            "bobot" => "0.27",
        ]);
        Guru::create([
            "nama_guru" => "Saidatul Mar'ah S.Pd.I",
            "bobot" => "0.23",
        ]);
    }
}
