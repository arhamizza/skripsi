<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
                    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $siswa = Siswa::all();
        $siswa2 = Kelas::all();
        Session::put('menu','siswa');
        return view('admin.siswa.siswa',compact('siswa','siswa2'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|max:255',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $siswa = new siswa;
        $siswa->id_kelas = $request->input('id_kelas');
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->save();
        return redirect('siswa_admin')
        ->with('success','New data siswa successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|max:255',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $siswa = siswa::find($id);
        $siswa->id_kelas = $request->input('id_kelas');
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->save();
        return redirect('siswa_admin')
        ->with('success','Data siswa successfully updated!');
    }

    public function delete($id)
    {
        siswa::find($id)->delete();
         return redirect('siswa_admin')
         ->with('success','Data siswa successfully deleted!');
    }
    public function import(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);
 
		// import data
		Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('siswa_admin');
	}
}
