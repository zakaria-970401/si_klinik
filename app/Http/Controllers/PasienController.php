<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Str;
use Auth;
use Session;

class PasienController extends Controller
{
    public function index()
    {
        $wilayah = DB::table('master_wilayah')->get();
        $tindakan = DB::table('master_tindakan')->get();
        $obat = DB::table('master_obat')->get();
        return view('add_pasien', compact('wilayah', 'tindakan', 'obat'));
    }

    public function store(Request $request)
    {
        $nominal = explode(',', $request->tagihan);
        $nominal = implode('', $nominal);
        $nominal = (int) $nominal;
        if ($nominal > 0) {
            DB::table('pasien')->insert([
                'nama' => $request->nama,
                'usia' => $request->usia,
                'id_wilayah' => $request->id_wilayah,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_obat' => $request->id_obat,
                'id_tindakan' => $request->id_tindakan,
                'keluhan' => $request->keluhan,
                'total_tagihan' => $nominal,
                'pariode_bulan' => date('m'),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => Auth::user()->name
            ]);

            $data = DB::table('pasien')
                ->where('created_by', Auth::user()->name)
                ->orderBy('id', 'desc')
                ->first()->id ?? 0;

            return response()->json([
                'data' => $data,
                'status' => 'ok',
            ]);
        } else {
            return response()->json([
                'status' => 'format',
            ]);
        }
    }

    public function invoice($id)
    {
        $data = DB::table('pasien')->where('id', $id)->first();
        return view('invoice', compact('data'));
    }

    public function report()
    {
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        $data = DB::table('pasien')
            ->whereYear('created_at', date('Y'))
            ->get();

        foreach ($bulan as $key => $value) {
            $pasien[] = $data->where('pariode_bulan', $key)->count();
        }
        $pasien = [
            'name' => 'Pasien',
            'data' => $pasien
        ];
        $series = json_encode($pasien);

        $jenis_kelamin = $data->groupBy('jenis_kelamin');
        $series_pie = [];
        foreach($jenis_kelamin as $key => $value){
            $series_pie[] = [
                'name' => $value->first()->jenis_kelamin,
                'y' => $value->count(),
            ];
        }
        $series_pie = json_encode($series_pie);

        return view('report', compact('series', 'series_pie'));
    }
}
