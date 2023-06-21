<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Datatable;
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
    public function index() 
    {
        $tabel = tabel::all();
        return view('users.index', compact('tabel'));
        // dd($tabel);
    }
}
