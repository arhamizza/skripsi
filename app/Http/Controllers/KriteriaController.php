<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class KriteriaController extends Controller
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

        $kriteria = kriteria::all();
        return view('admin.kriteria.index', compact('kriteria'));
        // dd($kriteria);
    }
    
    public function tambah()
    {
        $kriteria = kriteria::all();
        return view('admin.kriteria.tambah', compact('kriteria'));
    }

    public function insert(Request $request)
    {
        $kriteria = new kriteria();
        $kriteria->nama_kriteria = $request->input('nama_kriteria');
        $kriteria->bobot = $request->input('bobot');
        $kriteria->save();
        return redirect('kriteria_admin')->with('status', "data Berhasil Ditambahkan!");
    }

    public function edit($id)
    {
        $kriteria = kriteria::find($id);
        return view('admin.kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = kriteria::find($id);
        $kriteria->nama_kriteria = $request->input('nama_kriteria');
        $kriteria->bobot = $request->input('bobot');
        $kriteria->update();
        return redirect('kriteria_admin')->with('status',"data telah di update!");
    }

    public function destroy($id)
    {
        $data = kriteria::find($id);
        $data->delete();
        return redirect('kriteria_admin')->with('status',"data berhasil dihapus!");
    }
    use AuthorizesRequests, ValidatesRequests;
}
