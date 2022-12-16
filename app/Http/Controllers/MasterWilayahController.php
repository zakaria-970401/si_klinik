<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Auth;

class MasterWilayahController extends Controller
{
    public function index()
    {
        return view('master.wilayah');
    }

    public function getList()
    {
        $data = DB::table('master_wilayah')->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function store($wilayah)
    {
        DB::table('master_wilayah')->insert([
            'name' => $wilayah,
            'kode' => Str::random(7),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return response()->json([
            'status' => 'ok',
        ]);
    }

    public function editWilayah($kode)
    {
        $data = DB::table('master_wilayah')
            ->where('kode', $kode)
            ->first();

        return response()->json([
            'data' => $data
        ]);
    }

    public function updateWilayah($name, $kode)
    {
       DB::table('master_wilayah')
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

    public function deleteWilayah($kode)
    {
        $data = DB::table('master_wilayah')
            ->where('kode', $kode)
            ->delete();

        return response()->json([
            'data' => $data
        ]);
    }

}
