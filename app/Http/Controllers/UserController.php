<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Alternatif;
use App\Models\Datatable;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\tabel;
use App\Models\Transaksi;
use App\Models\TransaksiGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
    public function usersiswa() 
    {
        $siswa = Siswa::all();
        return view('users.siswauser', compact('siswa'));
        // dd($tabel);
    }
    public function userkelas() 
    {
        $kelas = Kelas::all();
        return view('users.kelasuser', compact('kelas'));
        // dd($tabel);
    }
    public function transaksi()
    {
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $transaksi = Transaksi::all();
        $transaksigurus = TransaksiGuru::orderBy('id_transaksi');
        $tran = TransaksiGuru::where('id_guru', Auth::id())->distinct('id_guru')->get(['id_guru']);
        // $tran = DB::table('transaksi_gurus')->select('id_guru')->distinct()->get();
        Session::put('menu','transaksi');
        // dd($tran);
        return view('users.transaksiuser',compact('gurus','transaksi','kelas','transaksigurus','tran'));
    }

    public function nilai_user($id_guru)
    {
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswa = Siswa::orderBy('id_kelas')->get();
        $transaksi = Transaksi::orderBy('id')->get();
        $tabel = Tabel::all();
        $transaksigurus = TransaksiGuru::orderBy('id_transaksi');    
        Session::put('menu','transaksi');
        if (TransaksiGuru::where('id_guru', $id_guru)->exists()) {
            $transaksi_guruss = TransaksiGuru::get();
            $transaksi_gurusss = TransaksiGuru::where('id_guru', $id_guru)->get();
            $id_guru;
            //  dd($transaksi);

            // $nilai = NilaiSiswa::where('id_transaksiguru', $transaksi_gurusss->id)->get();

            return view('users.nilaiuser', 
            compact('transaksi_gurusss','transaksi_guruss','siswa','tabel','id_guru','transaksi','transaksigurus'));
        } else {
            return redirect('/')->where('id_guru', "Slug doesnot exists");
        }
    }
    public function create_nilai(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required',
            'id_siswa' => 'required',
            'id_guru' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = new transaksiguru;
        $transaksi->id_guru = $request->id_guru;
        $transaksi->id_transaksi = $request->id_transaksi;
        if($request->filled('id_siswa')) {
            $transaksi->id_siswa = $request->id_siswa;
        } else {
            $transaksi->id_siswa = $request->null;
        }
        if($request->filled('id_linguistik')) {
            $transaksi->Nilai_linguistik = $request->id_linguistik;
        } else {
            $transaksi->Nilai_linguistik = $request->null;
        }
        $transaksi->user_id = Auth::id();
        $transaksi->save();
        return redirect('transaksiguru_guru')
        ->with('success','New data transaksi successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'id_linguistik' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = transaksiguru::find($id);
        $transaksi->Nilai_linguistik = $request->id_linguistik;
        $transaksi->save();
        return redirect('transaksiguru_guru')
        ->with('success','Data transaksi successfully updated!');
    }

    public function delete($id)
    {
        transaksiguru::find($id)->delete();
         return redirect('transaksiguru_admin')
         ->with('success','Data transaksi successfully deleted!');
    }
    
}
