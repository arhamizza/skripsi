<?php

namespace App\Http\Controllers;

use App\Models\datatable;
use App\Models\alternatif;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller as BaseController;

class AlternatifController extends Controller
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

        $alternatif = alternatif::all();
        return view('admin.alternatif.index', compact('alternatif'));
        // dd($alternatif);
    }
    
    public function tambah()
    {
        $alternatif = alternatif::all();
        return view('admin.alternatif.tambah', compact('alternatif'));
    }

    public function insert(Request $request)
    {
        $alternatif = new alternatif();
        $alternatif->nama_alternatif = $request->input('nama_alternatif');
        $alternatif->save();
        return redirect('alternatif_admin')->with('status', "data Berhasil Ditambahkan!");
    }

    public function edit($id)
    {
        $alternatif = alternatif::find($id);
        return view('admin.alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = alternatif::find($id);
        $alternatif->nama_alternatif = $request->input('nama_alternatif');
        $alternatif->update();
        return redirect('alternatif_admin')->with('status',"data telah di update!");
    }

    public function destroy($id)
    {
        $data = alternatif::find($id);
        $data->delete();
        return redirect('alternatif_admin')->with('status',"data berhasil dihapus!");
    }
    use AuthorizesRequests, ValidatesRequests;
}
