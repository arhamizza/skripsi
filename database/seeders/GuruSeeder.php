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
            "nama_guru" => "ANIK YUSMIARTI",
        ]);
        Guru::create([
            "nama_guru" => "AHAMD BAIHAQI",
        ]);
        Guru::create([
            "nama_guru" => "SRI WAHYUNI",
        ]);
    }
}
