<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\TransaksiGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransaksiGuruController extends Controller
{
    
    public function index()
    {

        $gurus = Guru::all();
        $kelas = Kelas::all();
        $siswas = Siswa::all();
        $transaksi = Transaksi::all();
        $transaksigurus = TransaksiGuru::orderBy('id_transaksi')->get();
        $tran = TransaksiGuru::distinct('id_guru')->get(['id_guru']);
        // $tran = DB::table('transaksi_gurus')->select('id_guru')->distinct()->get();
        Session::put('menu','transaksi');
        // dd($siswa);
        return view('admin.Transaksi.transaksiguru',compact('gurus','transaksi','kelas','transaksigurus','tran','siswas'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_guru' => 'required|different:transaksigurus',
            'id_siswa' => 'required',
            'id_transaksi' => 'required',
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
        $transaksi->Nilai_linguistik = $request->null;
        $transaksi->user_id = $request->id_guru;
        $transaksi->save();
        return redirect('transaksiguru_admin')
        ->with('success','New data transaksi successfully added!');
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
        $transaksi->user_id = $request->id_guru;
        $transaksi->save();
        return redirect('transaksiguru_admin')
        ->with('success','New data transaksi successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'id_siswa' => 'required',
            'id_linguistik' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $transaksi = transaksiguru::find($id);
        $transaksi->id_siswa = $request->id_siswa;
        $transaksi->Nilai_linguistik = $request->id_linguistik;
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
