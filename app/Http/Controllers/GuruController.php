<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
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
        $guru = Guru::all();
        Session::put('menu','guru');
        return view('admin.Guru.guru',compact('guru'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_guru' => 'required|max:255',
            'bobot' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $guru = new guru;
        $guru->nama_guru = $request->nama_guru;
        $guru->bobot = $request->bobot;
        $guru->save();
        return redirect('guru_admin')
        ->with('success','New data guru successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama_guru' => 'required|max:255',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $guru = guru::find($id);
        $guru->nama_guru = $request->nama_guru;
        $guru->save();
        return redirect('guru_admin')
        ->with('success','Data guru successfully updated!');
    }

    public function delete($id)
    {
        guru::find($id)->delete();
         return redirect('guru_admin')
         ->with('success','Data guru successfully deleted!');
    }
}
