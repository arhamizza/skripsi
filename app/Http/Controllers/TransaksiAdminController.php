<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\TransaksiGuru;
use App\Models\TransaksiGuruu;
use App\Models\TransaksiSiswa;
use App\Models\Transaksitambah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TransaksiAdminController extends Controller
{
    public function index2()
    {
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswas = Siswa::distinct('id_kelas')->get(['id_kelas']);
        $transaksi = Transaksi::all();
        $transaksigurus = TransaksiGuru::orderBy('id_transaksi')->get();
        $tran = TransaksiGuru::distinct('id_guru')->get(['id_guru']);
        $tambah = Transaksitambah::all();
        return view('admin.Transaksi.tambah',compact('gurus','transaksi','kelas','transaksigurus','tran','siswas','tambah'));

    }
    public function tambah(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = new Transaksi();
        $transaksi->kode = $request->kode;
        $transaksi->nama = $request->nama;
        $transaksi->id_kelas = $request->id_kelas;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->save();
        return redirect('transaksi_admin')
        ->with('success','New data transaksi successfully added!');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswas = Siswa::all();
        // $transaksi = Transaksi::all();
        // $transaksigurus = TransaksiGuru::orderBy('id_transaksi')->get();
        $transaksigurus = TransaksiGuruu::where('id_transaksi', $id)->get();
        $transaksisiswa = TransaksiSiswa::where('id_transaksi', $id)->get();
        // dd($transaksi);
        return view('admin.Transaksi.edit',compact('gurus','transaksi','kelas','transaksigurus','siswas','transaksisiswa'));

    }
    public function update(Request $request, $id)
    {
                $validator = Validator::make($request->all(), [
            'kode' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = Transaksi::find($id);
        $transaksi->kode = $request->kode;
        $transaksi->nama = $request->nama;
        $transaksi->id_kelas = $request->id_kelas;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->update();
        return redirect('transaksi_admin')->with('status',"data telah di update!");
    }
    public function guruadd(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required',
            'id_guru' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = new TransaksiGuruu();
        $transaksi->id_transaksi = $request->id_transaksi;
        $transaksi->id_guru = $request->id_guru;
        $id= $request->id_transaksi;
        $transaksi->save();
        return redirect('transaksigurus_edit/'.$id)
        ->with('success','New data transaksi successfully added!');

    }
    public function siswaadd(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required',
            'id_siswa' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = new TransaksiSiswa();
        $transaksi->id_transaksi = $request->id_transaksi;
        $transaksi->id_siswa = $request->id_siswa;
        $id= $request->id_transaksi;
        $transaksi->save();
        return redirect('transaksigurus_edit/'.$id)
        ->with('success','New data transaksi successfully added!');

    }

    public function deleteguru($id)
    {
        TransaksiGuruu::find($id)->delete();
         return redirect('transaksigurus_edit/'.$id)
         ->with('success','Data transaksi successfully deleted!');
    }
    public function deletesiswa($id)
    {
        TransaksiSiswa::find($id)->delete();
         return redirect('transaksigurus_edit/'.$id)
         ->with('success','Data transaksi successfully deleted!');
    }
    

}
