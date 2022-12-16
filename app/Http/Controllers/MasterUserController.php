<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Str;
use Auth;
use Session;

class MasterUserController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->where('status', 1)->get();
        return view('master.user', compact('data'));
    }

    public function store(Request $request)
    {
        $validasi = DB::table('users')
            ->where('email', $request->email)
            ->count();
        // dd($request->all());
        if ($validasi > 0) {
            Session::flash('warning', 'Email address already..');
            return back();
        } else {
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'auth_group' => $request->role,
                'password' => bcrypt($request->password),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => Auth::user()->name,
            ]);

            Session::flash('success', 'Data has been stored successfully');
            return back();
        }
    }

    public function edituser($id)
    {
        $data = DB::table('users')
            ->where('id', $id)
            ->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function updateuser(Request $request)
    {
        DB::table('users')
            ->where('id', $request->id_user)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'auth_group' => $request->role,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => Auth::user()->name
            ]);

        Session::flash('success', 'Data has been updated successfully');
        return back();
    }

    public function deleteuser($id)
    {
        $data = DB::table('users')
            ->where('id', $id)
            ->delete();

        Session::flash('success', 'Data has been deleted successfully');
        return back();
    }
}
