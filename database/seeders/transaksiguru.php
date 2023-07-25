<?php

namespace Database\Seeders;

use App\Models\TransaksiGuruu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class transaksiguru extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiGuruu::create([
            "id_transaksi" => "1",
            "id_guru" => "2",
       ]);
    }
}
