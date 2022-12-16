<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Auth;

class MasterTindakanController extends Controller
{
    public function index()
    {
        return view('master.tindakan');
    }

    public function getList()
    {
        $data = DB::table('master_tindakan')->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function store($tindakan)
    {
        DB::table('master_tindakan')->insert([
            'name' => $tindakan,
            'kode' => Str::random(7),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return response()->json([
            'status' => 'ok',
        ]);
    }

    public function edittindakan($kode)
    {
        $data = DB::table('master_tindakan')
            ->where('kode', $kode)
            ->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function updatetindakan($name, $kode)
    {
       DB::table('master_tindakan')
            ->where('kode', $kode)
            ->update([
                'name' => $name,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => Auth::user()->name
            ]);

        return response()->json([
            'status' => 'ok',
        ]);
    }

    public function deletetindakan($kode)
    {
        $data = DB::table('master_tindakan')
            ->where('kode', $kode)
            ->delete();

        return response()->json([
            'data' => $data
        ]);
    }

}
