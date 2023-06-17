<?php

namespace App\Http\Controllers;

use App\Models\datatable;
use App\Models\tabel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller as BaseController;

class TabelController extends Controller
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

        $tabel = tabel::all();
        return view('pages.tabel.index', compact('tabel'));
        // dd($tabel);
    }
    
    public function tambah()
    {
        $tabel2 = datatable::all();
        $tabel = tabel::all();
        return view('pages.tabel.tambah', compact('tabel','tabel2'));
    }

    public function insert(Request $request)
    {
        $tabel = new tabel();
        $tabel->id_linguistik = $request->input('id_linguistik');
        $tabel->A = $request->input('A');
        $tabel->B = $request->input('B');
        $tabel->C = $request->input('C');
        $tabel->D = $request->input('D');
        $tabel->save();
        return redirect('tabel')->with('status', "data Berhasil Ditambahkan!");
    }

    public function edit($id)
    {
        $tabel2 = datatable::all();
        $tabel = tabel::find($id);
        return view('pages.tabel.edit', compact('tabel','tabel2'));
    }

    public function update(Request $request, $id)
    {
        $tabel = tabel::find($id);
        $tabel->id_linguistik = $request->input('id_linguistik');
        $tabel->A = $request->input('A');
        $tabel->B = $request->input('B');
        $tabel->C = $request->input('C');
        $tabel->D = $request->input('D');
        $tabel->update();
        return redirect('tabel')->with('status',"data telah di update!");
    }

    public function destroy($id)
    {
        $data = tabel::find($id);
        $data->delete();
        return redirect('tabel')->with('status',"data berhasil dihapus!");
    }
    use AuthorizesRequests, ValidatesRequests;
}
