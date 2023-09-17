<?php

namespace App\Http\Controllers;

use App\Models\Datatable;
use App\Models\Guru;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\Tabel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends Controller
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
     * @return \Illuminate\View\View
     */
     public function index() {

        $data = datatable::all();
        return view('admin.dashboard.dashboard', compact('data'));

    }

    public function index2() {
        $data = datatable::all();
        $tabel = tabel::all();
        $kriteria = Kriteria::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('admin.dashboard.welcome', compact('data','tabel','kriteria','siswa','guru'));

    }
    
    public function tambah()
    {
        return view('admin.dashboard.tambah');
    }

    public function insert(Request $request)
    {
        $data = new datatable();
        if ($request->hasFile('visualisasi')) {
            $file = $request->file('visualisasi');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('paper/img', $filename);
            $data->visualisasi = $filename;
        }

        $data->nama = $request->input('nama');
        $data->save();
        return redirect('/home')->with('status', "data Berhasil Ditambahkan!");
    }

    public function edit($id)
    {
        $data = datatable::find($id);
        return view('admin.dashboard.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = datatable::find($id);
        if ($request->hasFile('visualisasi'))
        {
            $path = 'paper/img/'.$data->visualisasi;
            if (File::exists($path))
             {
                File::delete($path);
            }
            $file = $request->file('visualisasi');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('paper/img', $filename);
            $data->visualisasi = $filename;
        }
        $data->nama = $request->input('nama');
        $data->update();
        return redirect('/home')->with('status',"data telah di update!");
    }

    public function destroy($id)
    {
        $data = datatable::find($id);
        if ($data->visualisasi)
         {
            $path = 'paper/img/'.$data->visualisasi;
            if (File::exists($path))
             {
                File::delete($path);
            }
        }
        $data->delete();
        return redirect('/home')->with('status',"data berhasil dihapus!");
    }
    use AuthorizesRequests, ValidatesRequests;
}
