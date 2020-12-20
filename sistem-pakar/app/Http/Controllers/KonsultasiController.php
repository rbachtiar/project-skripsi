<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiController extends Controller
{
    public function konsultasiData($params)
    {
        $arrKode = $params[0];
        if($arrKode == "P") {
            $data = DB::table('penyakit')->where('kode_penyakit', $params)->get();
        } else if($arrKode == "G") {
            $data = DB::table('rules')->where('kode_gejala', $params)->get();
        }
        // dd($data);
        return response()->json([
            'next' => $arrKode,
            'data' => $data
        ]);
    }
}
