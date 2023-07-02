<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;

class UserManagementController extends Controller
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
        $users = user::all();
        Session::put('menu','user');
        return view('usermanagement.user',compact('users'));
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'name' => 'required',
            'is_active' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $user = new user;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->is_active = $request->is_active;
        $user->save();
        return redirect('usermanagement')
        ->with('success','New data user successfully added!');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'name' => 'required',
            'is_active' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()->with('error', $validator->messages()->all()[0])->withInput();
        }
        $user = user::find($id);
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->is_active = $request->is_active;
        $user->save();
        return redirect('usermanagement')
        ->with('success','Data user successfully updated!');
    }

    public function delete($id)
    {
        user::find($id)->delete();
         return redirect('usermanagement')
         ->with('success','Data user successfully deleted!');
    }
}
