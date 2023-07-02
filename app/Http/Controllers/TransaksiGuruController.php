<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\TransaksiGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransaksiGuruController extends Controller
{
    
    public function index()
    {

        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        $transaksi = Transaksi::all();
        $transaksigurus = TransaksiGuru::orderBy('id_transaksi')->get();
        Session::put('menu','transaksi');
        return view('admin.Transaksi.transaksiguru',compact('gurus','transaksi','kelas','transaksigurus'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_guru' => 'required',
            'id_transaksi' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = new transaksiguru;
        $transaksi->id_guru = $request->id_guru;
        $transaksi->id_transaksi = $request->id_transaksi;
        $transaksi->save();
        return redirect('transaksiguru_admin')
        ->with('success','New data transaksi successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'id_guru' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = transaksiguru::find($id);
        $transaksi->id_guru = $request->id_guru;
        $transaksi->save();
        return redirect('transaksiguru_admin')
        ->with('success','Data transaksi successfully updated!');
    }

    public function delete($id)
    {
        transaksiguru::find($id)->delete();
         return redirect('transaksiguru_admin')
         ->with('success','Data transaksi successfully deleted!');
    }
}
