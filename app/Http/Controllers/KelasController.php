<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
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
        $kelas = Kelas::all();
        Session::put('menu','kelas');
        return view('admin.kelas.kelas',compact('kelas'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|max:255',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $kelas = new kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();
        return redirect('kelas_admin')
        ->with('success','New data kelas successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|max:255',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $kelas = kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();
        return redirect('kelas_admin')
        ->with('success','Data kelas successfully updated!');
    }

    public function delete($id)
    {
        kelas::find($id)->delete();
         return redirect('kelas_admin')
         ->with('success','Data kelas successfully deleted!');
    }
}
