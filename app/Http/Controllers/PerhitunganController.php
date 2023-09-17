<?php

namespace App\Http\Controllers;

use App\Models\Datatable;
use Database\Seeders\tabel;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function hitung()
    {
        $data = Datatable::all();
        // $A11 []= [1,2,3,4,5];
        $A11= 1-(1-0.33)^(3*0.4);
        var_dump($A11);
        // return view('admin.kelas.kelas',compact('kelas'));
    }
}
