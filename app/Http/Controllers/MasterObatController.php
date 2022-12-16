<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Str;
use Auth;
use Session;

class MasterObatController extends Controller
{
    public function index()
    {
        $data = DB::table('master_obat')->where('status', 1)->get();
        return view('master.obat', compact('data'));
    }

    public function store(Request $request)
    {
        DB::table('master_obat')->insert([
            'name' => $request->name,
            'jenis' => $request->jenis,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        Session::flash('success', 'Data has been stored successfully');
        return back();

    }

    public function editObat($id)
    {
        $data = DB::table('master_obat')
            ->where('id', $id)
            ->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function updateObat(Request $request)
    {
       DB::table('master_obat')
            ->where('id', $request->id_obat)
            ->update([
                'name' => $request->name,
                'jenis' => $request->jenis,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => Auth::user()->name
            ]);

        Session::flash('success', 'Data has been updated successfully');
        return back();
    }

    public function deleteObat($id)
    {
        $data = DB::table('master_obat')
            ->where('id', $id)
            ->delete();

        Session::flash('success', 'Data has been deleted successfully');
        return back();
    }

}
