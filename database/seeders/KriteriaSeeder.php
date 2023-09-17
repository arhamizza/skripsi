<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kriteria::create([
            "nama_kriteria" => "Nilai Akademik",
            "bobot" => "40",
        ]);
        Kriteria::create([
            "nama_kriteria" => "Nilai Non-Akademik",
            "bobot" => "30",
        ]);
        Kriteria::create([
            "nama_kriteria" => "Kedisiplinan",
            "bobot" => "30",
        ]);
    }
}
