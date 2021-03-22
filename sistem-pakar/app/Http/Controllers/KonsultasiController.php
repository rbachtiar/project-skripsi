<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function konsultasiData($params)
    {
        $arrKode = $params[0];
        $data = [];
        if($arrKode == "P") {
            $data = DB::table('penyakit')->where('kode_penyakit', $params)->get();
        } else if($arrKode == "G") {
            $data = DB::table('rules')->where('kode_gejala', $params)->get();
        }
        return response()->json([
            'next' => $arrKode,
            'data' => $data
        ]);
    }

    public function storePengunjung(Request $request)
    {
        $data = [
            'nama' => $request->nama ?? null,
            'alamat' => $request->alamat ?? null,
            'email' => $request->email ?? null,
        ];
        $save = DB::table('pengunjung')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        session(['id' => $id]);
        if($save) {
            return redirect('konsultasi');
        }
    }

    public function storeGejalaPengunjung(Request $request)
    {
        $data = [
            'kode_gejala' => $request->kode_gejala,
            'gejala' => $request->gejala,
            'id_pengunjung' => session('id')
        ];
        $save = DB::table('gejala_user')->insert($data);
        if($save) {
            return response()->json(['save_gejala' => 'success']);
        }
    }

    public function postFinal(Request $request)
    {
        $id = session('id');
        $kode = [
            'kode_penyakit' => $request->kode
        ];
        $save = DB::table('pengunjung')->where('id', $id)->update($kode);
        if($save) {
            return response()->json(['update_pengunjung' => 'success']);
        }
    }

}
