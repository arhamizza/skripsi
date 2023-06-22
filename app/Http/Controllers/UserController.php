<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Alternatif;
use App\Models\Datatable;
use App\Models\Kriteria;
use App\Models\tabel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function usertabel() 
    {
        $tabel = tabel::all();
        return view('users.index', compact('tabel'));
        // dd($tabel);
    }
    public function useralternatif() 
    {
        $alternatif = Alternatif::all();
        return view('users.alternatifuser', compact('alternatif'));
        // dd($tabel);
    }
    public function userkriteria() 
    {
        $kriteria = Kriteria::all();
        return view('users.kriteriauser', compact('kriteria'));
        // dd($tabel);
    }

    
}
