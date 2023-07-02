<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\Kelas;
use App\Models\Transaksi;
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

    public function create(Request $request)
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
        $transaksi = new transaksi;
        $transaksi->nama = $request->nama;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->id_guru = json_encode($request->id_guru);
        $transaksi->id_kelas = $request->id_kelas;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();
        return redirect('transaksi_admin')
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
