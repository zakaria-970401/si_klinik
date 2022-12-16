<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Str;
use Auth;
use Session;

class MasterPegawaiController extends Controller
{
    public function index()
    {
        $data = DB::table('master_pegawai')->where('status', 1)->get();
        return view('master.pegawai', compact('data'));
    }

    public function store(Request $request)
    {
        DB::table('master_pegawai')->insert([
            'name' => $request->name,
            'nik' => $request->nik,
            'dept' => $request->dept,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        Session::flash('success', 'Data has been stored successfully');
        return back();

    }

    public function editpegawai($id)
    {
        $data = DB::table('master_pegawai')
            ->where('id', $id)
            ->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function updatepegawai(Request $request)
    {
       DB::table('master_pegawai')
            ->where('id', $request->id_pegawai)
            ->update([
                'name' => $request->name,
                'nik' => $request->nik,
                'dept' => $request->dept,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => Auth::user()->name
            ]);

        Session::flash('success', 'Data has been updated successfully');
        return back();
    }

    public function deletepegawai($id)
    {
        $data = DB::table('master_pegawai')
            ->where('id', $id)
            ->delete();

        Session::flash('success', 'Data has been deleted successfully');
        return back();
    }

}
