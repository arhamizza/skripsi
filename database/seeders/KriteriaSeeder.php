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
            "nama_kriteria" => "C1",
        ]);
        Kriteria::create([
            "nama_kriteria" => "C2",
        ]);
    }
}
