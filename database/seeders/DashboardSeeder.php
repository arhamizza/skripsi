<?php

namespace Database\Seeders;

use App\Models\Datatable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Datatable::create([
            "nama" => "Nothing",
            "visualisasi" => "nothing.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Nothing and Very Bad",
            "visualisasi" => "between N and VB.JPG",
        ]);
        Datatable::create([
            "nama" => "Very Bad",
            "visualisasi" => "VG.JPG",
        ]);
        Datatable::create([
            "nama" => "At least Very Bad",
            "visualisasi" => "at least VG.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Very Bad and Bad",
            "visualisasi" => "between VB and B.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Very Bad and Medium",
            "visualisasi" => "between VB and M.JPG",
        ]);
        Datatable::create([
            "nama" => "At most Very Bad",
            "visualisasi" => "at most VB.JPG",
        ]);
        Datatable::create([
            "nama" => "Bad",
            "visualisasi" => "B.JPG",
        ]);
        Datatable::create([
            "nama" => "At least Bad",
            "visualisasi" => "at least B.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Bad and Medium",
            "visualisasi" => "between B and M.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Bad and Good",
            "visualisasi" => "between B and G.JPG",
        ]);
        Datatable::create([
            "nama" => "At most Bad",
            "visualisasi" => "at most B.JPG",
        ]);
        Datatable::create([
            "nama" => "Medium",
            "visualisasi" => "M.JPG",
        ]);
        Datatable::create([
            "nama" => "At least Medium",
            "visualisasi" => "at least M.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Medium and Good",
            "visualisasi" => "between M and G.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Medium and Very Good",
            "visualisasi" => "between M and VG.JPG",
        ]);
        Datatable::create([
            "nama" => "At most Medium",
            "visualisasi" => "at most M.JPG",
        ]);
        Datatable::create([
            "nama" => "Good",
            "visualisasi" => "G.JPG",
        ]);
        Datatable::create([
            "nama" => "At least Good",
            "visualisasi" => "at least G.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Good and Very Good",
            "visualisasi" => "between G and VG.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Good and Perfect",
            "visualisasi" => "between G and P.JPG",
        ]);
        Datatable::create([
            "nama" => "At most Good",
            "visualisasi" => "at most G.JPG",
        ]);
        Datatable::create([
            "nama" => "Very Good",
            "visualisasi" => "VG.JPG",
        ]);
        Datatable::create([
            "nama" => "At least Very Good",
            "visualisasi" => "at least VG.JPG",
        ]);
        Datatable::create([
            "nama" => "At least Perfect",
            "visualisasi" => "at least P.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Very Good and Perfect",
            "visualisasi" => "between VG and P.JPG",
        ]);
        Datatable::create([
            "nama" => "At most Very Good",
            "visualisasi" => "at most VG.JPG",
        ]);
        Datatable::create([
            "nama" => "At most Perfect",
            "visualisasi" => "at most P.JPG",
        ]);
        Datatable::create([
            "nama" => "Perfect",
            "visualisasi" => "P.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Nothing and Bad",
            "visualisasi" => "between N and B.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Bad and Very Good",
            "visualisasi" => "between B and VG.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Nothing and Medium",
            "visualisasi" => "between N and B.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Very Bad and Good",
            "visualisasi" => "between VG and G.JPG",
        ]);
        Datatable::create([
            "nama" => "Between Medium and Perfect",
            "visualisasi" => "between M and P.JPG",
        ]);
  
    }
}
