<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kriteria;
use App\Models\NilaiSiswa;
use App\Models\Siswa;
use App\Models\Tabel;
use App\Models\Transaksi;
use App\Models\TransaksiGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $guru = guru::all();
        $kelas = Kelas::all();
        $transaksi = Transaksi::all();
        Session::put('menu','transaksi');
        return view('admin.Transaksi.transaksi',compact('guru','transaksi','kelas'));
    }
    public function nilai_admin($id_guru)
    {
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswa = Siswa::orderBy('id_kelas')->get();
        $transaksi = Transaksi::orderBy('id')->get();
        $tabel = Tabel::all();
        $Kriteria = Kriteria::all();
        
        Session::put('menu','transaksi');
        if (TransaksiGuru::where('id_guru', $id_guru)->exists()) {
            $transaksi_guruss = TransaksiGuru::get();
            $transaksi_gurusss = TransaksiGuru::where('id_guru', $id_guru)->get();
            $id_guru;
            //  dd($transaksi);

            // $nilai = NilaiSiswa::where('id_transaksiguru', $transaksi_gurusss->id)->get();

            return view('admin.Transaksi.nilai', 
            compact('transaksi_gurusss','transaksi_guruss','siswa','tabel','id_guru','transaksi','Kriteria'));
        } else {
            return redirect('/')->where('id_guru', "Slug doesnot exists");
        }
    }
    public function nilai2_admin($id_guru, $id_transaksiguru)
    {

        if (TransaksiGuru::where('id_guru', $id_guru)->exists()) {
            $transaksi_guruss = TransaksiGuru::where('id_guru', $id_guru)->get();
            if (NilaiSiswa::where('id_transaksiguru', $id_transaksiguru)->exists()) {
                $nilai = NilaiSiswa::where('id_transaksiguru', $id_transaksiguru)->get();
                return view('admin.Transaksi.nilaisiswa', compact('transaksi_guruss','nilai'));
            }



        } else {
            return redirect('/')->where('status', "Slug doesnot exists");
        }
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required|unique:gurus',
            'id_transaksi' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = new transaksiguru;
        $transaksi->id_guru = $request->id_guru;
        $transaksi->id_transaksi = $request->id_transaksi;
        $transaksi->id_siswa = $request->null;
        $transaksi->Nilai_linguistik = $request->null;
        $transaksi->save();
        return redirect('transaksiguru_admin')
        ->with('success','New data transaksi successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'tanggal' => 'required|date',
            'id_kelas' => 'required',
            'keterangan' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = transaksi::find($id);
        $transaksi->nama = $request->nama;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->id_kelas = $request->id_kelas;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();
        return redirect('transaksi_admin')
        ->with('success','Data transaksi successfully updated!');
    }

    public function delete($id)
    {
        transaksi::find($id)->delete();
         return redirect('transaksi_admin')
         ->with('success','Data transaksi successfully deleted!');
    }
}
